@extends('adminlte::page')
@section('title',trans('employees.create_employee'))
@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>
            <i class="fas fa-building" style="margin:10px 10px 10px 10px;"></i>@lang('employees.create_employee')
        </h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">@lang('global.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="{{route('employees.index')}}">@lang('employees.employees')</a></li>
            <li class="breadcrumb-item active">@lang('global.create')</li>
        </ol>
    </div>
</div>
@stop
@section('content')
<form class="form form-vertical" action="{{route('employees.store')}}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a href="{{route('employees.index')}}" class="btn btn-info"><i class="fas fa-undo-alt"></i> @lang('global.return')</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> @lang('global.save')</button>        
                </div>
            </div> 
        </div>
        <div class="card-body">   
            <div class="row align-items-end">
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">                    
                    <label for="first_name" class="control-label">@lang('employees.first_name')</label>
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="@lang('employees.first_name')" required="required">
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="last_name" class="control-label">@lang('employees.last_name')</label>
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="@lang('employees.last_name')" required="required">                    
                </div> 
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="company_id" class="control-label">@lang('employees.company')</label>
                    <select id="company_id" name="company_id" class="form-control select2 select2-hidden-accessible" data-placeholder="@lang('employees.company')" style="width:100%;">
                        <option value=""></option>
                        @foreach($companies as $company)
                            <option @if(old('company_id') == $company->id) selected="selected" @endif value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>                
            </div>
            <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="email" class="control-label">@lang('employees.email')</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="@lang('employees.email')">                    
                </div>      
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="phone" class="control-label">@lang('employees.phone')</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="@lang('employees.phone')">                    
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
});
</script>
@endsection