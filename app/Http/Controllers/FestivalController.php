<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Festival;
use App\Models\Holiday;
use App\Models\Theme_layout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FestivalController extends Controller
{

    public function index()
    {
        //$theme_layout = Theme_layout::get();
        $festival = Festival::with('company', 'theme_layout')->orderBy('id', 'desc')->get();;
        return view('festivals.list_festival', compact('festival'));
    }

    public function create(Request $reqest)
    {
        $theme_layout = Theme_layout::get();
        $company = Company::get();
        //dd($company);
        return view('festivals.add_festival', compact('company', 'theme_layout'));
    }

    public function store(Request $request)
    {


        $festival = new Festival();
        $festival->company_id = $request->company_id;
        $festival->theme_layout_id = $request->theme_layout_id;
        $festival->festival = $request->festival;
        $festival->slug = $this->slug(str::slug($request->festival, '-'), 0);

        $path = public_path() . '/upload/festival/';
        File::makeDirectory($path, $mode = 0777, true, true);
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = sha1(time() . uniqid()) . '.' . $file->getClientOriginalExtension();
            $file->move('asset/upload/festival', $filename);
            $festival->image = $filename;
        }
        $festival->date = $request->date;
        $festival->save();
        return redirect('/admin/festival');
    }

    public function slug($slug, $i = 0)
    {
        $old_slug = $slug;
        if ($i != 0) {
            $slug = $slug . '-' . $i;
        }
        $festival = Festival::select('slug')->where('slug', $slug)->orderBy('id', 'desc')->count();
        if ($festival > 0) {
            return $this->slug($old_slug, $i + 1);
        } else {
            return $slug;
        }
    }

    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $festival = Festival::where('id', $id)->first();
        $company = Company::get();
        $theme_layout = Theme_layout::get();
        //dd($theme_layout);
        return view('festivals.edit_festival', compact('festival', 'company', 'theme_layout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $festival = Festival::where('id', $id)->first();
        $festival->company_id = $request->company_id;
        $festival->theme_layout_id = $request->theme_layout_id;
        $festival->festival = $request->festival;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = sha1(time() . uniqid()) . '.' . $file->getClientOriginalExtension();
            $file->move('asset/img/', $filename);
            $festival->image = $filename;
        }
        $festival->date = $request->date;
        $festival->save();
        return redirect('admin/festival');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $festival = Festival::find($id);
        $path = public_path('asset/img/' . $festival->image);
        if (File::exists($path)) {
            unlink($path);
        }
        $festival->delete();
        return response()->json($festival);
    }

    public function user()
    {
        $holiday = Holiday::get();
        return view('user', compact('holiday'));
    }
}
