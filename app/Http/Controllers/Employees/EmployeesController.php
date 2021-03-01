<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreEmployeesRequest;
use App\Http\Requests\UpdateEmployeesRequest;
use Illuminate\Database\QueryException;
use App\Models\Employee;
use App\Models\Company;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);        
        return view('admin.employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.employees.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeesRequest $request)
    {
        try{
            Employee::create($request->all());
            Session::flash('success',trans('employees.store_ok'));
            return redirect()->route('employees.index');            
        }//try
        catch(QueryException $e){
            Session::flash('error','error: '.$e->getMessage());
            return redirect()->route('employees.create')->withInput(); 
        }//cath 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('admin.employees.edit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeesRequest $request, Employee $employee)
    {
        try{
            $employee->update($request->all());  
            Session::flash('success',trans('employees.update_ok'));
            return redirect()->route('employees.edit',$employee->id);            
        }//try
        catch(QueryException $e){
            Session::flash('error','error: '.$e->getMessage());
            return redirect()->route('employees.edit',$employee->id)->withInput(); 
        }//cath 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try{          
            $employee->delete();
            Session::flash('success',trans('employees.deleted_ok'));
            return redirect()->route('employees.index');            
        }//try
        catch(QueryException $e){
            Session::flash('error','error: '.$e->getMessage());
            return redirect()->route('employees.show',$employee->id)->withInput(); 
        }//cath 
    }
}
