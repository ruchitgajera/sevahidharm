<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Theme_layout;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theme_layout = Theme_layout::get();
        $company = Company::get();
        return view('companies.list_company', compact('company','theme_layout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theme_layout = Theme_layout::get();
        //dd($theme_layout);
        return view('companies.add_company', compact('theme_layout'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company();
        $company->theme_layout_id = $request->theme_layout_id;
        $company->company_name = $request->company_name;
        $company->address = $request->address;
        $company->slug = $this->slug(str::slug($request->company_name, '-'), 0);
        $company->save();
        return redirect('/admin/company');
    }

    public function slug($slug, $i = 0)
    {
        $old_slug = $slug;
        if ($i != 0) {
            $slug = $slug . '-' . $i;
        }
        $company = Company::select('slug')->where('slug', $slug)->orderBy('id', 'desc')->count();
        if ($company > 0) {
            return $this->slug($old_slug, $i + 1);
        } else {
            return $slug;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('id', $id)->first();
        $theme_layout = Theme_layout::get();
        return view('companies.edit_company', compact('company', 'theme_layout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::where('id', $id)->first();
        $company->theme_layout_id = $request->theme_layout_id;
        $company->company_name = $request->company_name;
        $company->address = $request->address;

        $company->save();
        return redirect('admin/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return response()->json($company);
    }
}
