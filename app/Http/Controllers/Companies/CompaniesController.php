<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCompaniesRequest;
use App\Http\Requests\UpdateCompaniesRequest;
use Illuminate\Database\QueryException;
use App\Models\Company;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('admin.companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompaniesRequest $request)
    {        
        try{
            $company = Company::create($request->all());
            if($request->file_logo){
                $company->logo = $request->file_logo->store('logo',['disk'=>'public']);
            }//if
            $company->save();
            Session::flash('success',trans('companies.store_ok'));
            return redirect()->route('companies.index');            
        }//try
        catch(QueryException $e){
            Session::flash('error','error: '.$e->getMessage());
            return redirect()->route('companies.create')->withInput(); 
        }//cath          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('admin.companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompaniesRequest $request, Company $company)
    {
        try{
            $company->update($request->all());  
            if($request->file_logo){
                Storage::disk('public')->delete($company->logo);
                $company->logo = $request->file_logo->store('logo',['disk'=>'public']);
            }//if
            $company->save();
            Session::flash('success',trans('companies.update_ok'));
            return redirect()->route('companies.edit',$company->id);            
        }//try
        catch(QueryException $e){
            Session::flash('error','error: '.$e->getMessage());
            return redirect()->route('companies.edit',$company->id)->withInput(); 
        }//cath 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        try{
            if($company->employees->count() > 0){
                Session::flash('error',trans('companies.msg_error_delete'));
                return redirect()->route('companies.show',$company->id);
            }//if            
            if($company->delete() && $company->logo){
                Storage::disk('public')->delete($company->logo);
            }//if
            Session::flash('success',trans('companies.deleted_ok'));
            return redirect()->route('companies.index');            
        }//try
        catch(QueryException $e){
            Session::flash('error','error: '.$e->getMessage());
            return redirect()->route('companies.show',$company->id)->withInput(); 
        }//cath         
    }
}
