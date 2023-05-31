<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Models\Holiday;
use App\Models\Theme_layout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HolidayController extends Controller
{
    public function index()
    {
        $festival = Festival::get();
        return view('frontend.festival_view', compact('festival'));
    }

    public function create(Request $request, $slug)
    {
        $festival = Festival::where('slug', $slug)->first();
        return view('frontend.holiday', compact('festival'));
    }

    public function store(Request $request ,$slug)
    {
       //dd($slug);
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'name' => 'required | string | max:30',
            'number' => 'required',
            'address' => 'required | max:100',
        ]);
        if ($validator->fails()) {
            return redirect(route('create', $slug))
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $festival = Festival::where('slug',$slug)->first();
            $id = $festival->id;
            $holiday = new Holiday();
            $holiday->festival_id = $id;
            $holiday->name = $request->name;
            $holiday->number = $request->number;
            $holiday->address = $request->address;


            $path = public_path() . '/upload/festival/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $filename = sha1(time() . uniqid()) . '.png';


            $temp = $this->test($request->image, $filename);
            $festival = Festival::where('id', $id)->first();
            $layouts = Theme_layout::where('id', $festival->theme_layout_id)->first();


            $holiday->image = $temp;
            $holiday->save();

            $event = $layouts->event_theme;
            $layout = explode(",", $event);
            
            $event_x = $layout[0];
            $event_y = $layout[1];

            $x = $event_x;
            $y = $event_y;
            header('Content-Type: image/jpg');
            $targetFolder = '/asset/img/';
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;


            $img1 = public_path($temp);
            $img2 = $targetPath . $festival->image;


            $outputImage = imagecreatetruecolor($event_x, $event_y);

            // set background to white
            $white = imagecolorallocate($outputImage, 255, 255, 255);
            imagefill($outputImage, 0, 0, $white);

            $blue = imagecolorallocate($outputImage, 255, 255, 255);
            imagefill($outputImage, 0, 0, $blue);

            $second = imagecreatefromjpeg($img2);
            $first = imagecreatefrompng($img1);

            $theme = $layouts->layout;
            $layout = explode(",", $theme);

            $dst_x = $layout[0];
            $dst_y = $layout[1];
            $src_x = $layout[2];
            $src_y = $layout[3];
            $dst_width = $layout[4];
            $dst_height = $layout[5];
            $src_width = $layout[6];
            $src_height = $layout[7];


            imagecopyresized($outputImage, $second, 0, 0, 0, 0, $event_x, $event_y, $event_x, $event_y);
            imagecopyresized($outputImage, $first, $dst_x, $dst_y, $src_x, $src_y, $dst_width, $dst_height, $src_width, $src_height);
            //imagecopyresized($outputImage, $third, 845, 84, 0, 0, 470, 470, 470, 470);


            $name = $layouts->text;
            $text = explode(",", $name);

            $size = $text[0];
            $angle = $text[1];
            $width = $text[2];
            $height = $text[3];

            // Add the text
            $text = $request->name;
            $font =  public_path('asset/font/arial.ttf');
            imagettftext($outputImage, $size, $angle, $width, $height, $blue, $font, $text);


            $number = $layouts->number;
            $text = explode(",", $number);

            $size = $text[0];
            $angle = $text[1];
            $width = $text[2];
            $height = $text[3];


            $text = $request->number;
            $font =  public_path('asset/font/arial.ttf');
            imagettftext($outputImage, $size, $angle, $width, $height, $blue, $font, $text);

            $filename = $targetPath . round(microtime(true)) . '.png';
            imagepng($outputImage, $filename);
            imagedestroy($outputImage);
            return response()->download($filename,$temp);//->back();
           
        } catch (\Exception $e) {
            echo $e;
            //return redirect()->back();
        }
    }

    public function test($name, $get_name)
    {
        $ifp = fopen($get_name, 'wb');
        $data = explode(',', $name);
        fwrite($ifp, base64_decode($data[1]));
        fclose($ifp);
        return $get_name;
    }

    public function show(Holiday $holiday)
    {
        //
    }

    public function edit(Holiday $holiday)
    {
        //
    }

    public function update(Request $request, Holiday $holiday)
    {
        //
    }

    public function destroy(Request $request)
    {
        $holiday = Holiday::where('id',$request->id)->first();
        //dd($holiday);
        
        $path = public_path('/'.$holiday->image);
        if (File::exists($path)){
            unlink($path);
        }
       // dd($path);
        $holiday->delete();
        return response()->json($holiday);
    }
}
