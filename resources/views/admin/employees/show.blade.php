@extends('adminlte::page')
@section('title',trans('employees.delete_employee'))
@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>
            <i class="fas fa-building" style="margin:10px 10px 10px 10px;"></i>@lang('employees.delete_employee')
        </h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">@lang('global.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="{{route('employees.index')}}">@lang('employees.employees')</a></li>
            <li class="breadcrumb-item active">@lang('global.delete')</li>
        </ol>
    </div>
</div>
@stop
@section('content')
<form class="form form-vertical" id="frm-delete" action="{{route('employees.destroy',$employee->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a href="{{route('employees.index')}}" class="btn btn-info"><i class="fas fa-undo-alt"></i> @lang('global.return')</a>
                    <button type="submit" class="btn btn-danger confirm-delete"><i class="fas fa-trash-alt"></i> @lang('global.delete')</button>        
                </div>
            </div> 
        </div>
        <div class="card-body">   
            <div class="row align-items-end">
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">                    
                    <label for="first_name" class="control-label">@lang('employees.first_name')</label>
                    <input type="text" id="first_name" name="first_name" value="{{ $employee->first_name }}" class="form-control" placeholder="@lang('employees.first_name')" required="required">
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="last_name" class="control-label">@lang('employees.last_name')</label>
                    <input type="text" id="last_name" name="last_name" value="{{ $employee->last_name }}" class="form-control" placeholder="@lang('employees.last_name')" required="required">                    
                </div> 
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="company_id" class="control-label">@lang('employees.company')</label>
                    <input type="text" id="company_id" name="company_id" value="{{ $employee->company->name }}" class="form-control" placeholder="@lang('employees.company')">
                </div>                
            </div>
            <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="email" class="control-label">@lang('employees.email')</label>
                    <input type="email" id="email" name="email" value="{{ $employee->email }}" class="form-control" placeholder="@lang('employees.email')">                    
                </div>      
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="phone" class="control-label">@lang('employees.phone')</label>
                    <input type="text" id="phone" name="phone" value="{{ $employee->phone }}" class="form-control" placeholder="@lang('employees.phone')">                    
                </div>                
            </div>            
        </div>
    </div>
</form>
@stop
@section('js')
<script>
$(document).ready(function(){
    $(".select2").select2();
    $(".confirm-delete").click(function(e){
        e.preventDefault();
        Swal.fire({
            title: "@lang('global.are_you_sure')",
            text: "@lang('global.confirm_msg_delete')",
            type: "warning",
            showCancelButton: true,
            cancelButtonColor: "#6c757d",
            confirmButtonColor: "#ed5564",
            confirmButtonText: "@lang('global.yes_delete_it')"
        }).then((result) => {
            if(result.value){
                $("#frm-delete").submit();
            }
        });       
    });     
});
</script>
@endsection