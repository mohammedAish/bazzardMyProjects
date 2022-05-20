<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Models\Commpany;
use App\Models\store;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=Commpany::all();
        return view('admin.company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $data=$request->all();
        if($request->hasFile('logo'))
            {    
                $file=$request->file('logo');
                $new_avatar_name = uniqid() .'.' . $request->logo->extension();
                $file->move(public_path('img'), $new_avatar_name);
                $logo= $new_avatar_name;
                $data['logo']=$logo;
            }

        Commpany::create($data);
        return redirect()->route('company.index')->with('success',__('home.added_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company=Commpany::findOrFail($id);
        return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = Commpany::findOrFail($id);
        $data=$request->all();
        if($request->hasFile('logo'))
        {    
            $file=$request->file('logo');
            $new_avatar_name = uniqid() .'.' . $request->logo->extension();
            $file->move(public_path('img'), $new_avatar_name);
            $logo= $new_avatar_name;
            $data['logo']=$logo;
        }
        $company->update($data);

        return redirect()->route('company.index')->with('success',__('home.update_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Commpany::findOrFail($id);
        $company->delete();
        return redirect()->route('company.index')->with('success',__('home.deleted_successfully'));
    }

    public function company($slug)
    {
        $companies=Commpany::all();
        $store =Store::where('slug',$slug)->first();
        $selected_commpany=Commpany::where('company_id',$store->company_id)->first();
        return view('admin.company.show',compact('companies','selected_commpany','store'));
    }

    public function storeCompany(Request $request,$slug)
    {
        $store=Store::where('slug',$slug);
        Store::updateOrCreate(['slug' => $slug,
        ],[
            'company_id'=>$request->company_id,
        ]);
        return redirect()->back()->with('success',__('home.added_successfully'));
    }
}

