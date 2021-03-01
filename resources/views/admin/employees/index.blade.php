@extends('adminlte::page')
@section('title',trans('employees.employees'))
@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>
            <i class="fas fa-users" style="margin:10px 10px 10px 10px;"></i>@lang('employees.employees')
        </h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">@lang('global.dashboard')</a></li>
            <li class="breadcrumb-item active">@lang('employees.employees')</li>
        </ol>
    </div>
</div>
@stop
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <a href="{{route('employees.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> @lang('global.create')</a>           
        </div>
    </div>
    <div class="card-body">          
        <table class="table table-bordered table-responsive-lg">
            <thead>
                <tr>
                    <th>@lang('employees.first_name')</th>
                    <th>@lang('employees.last_name')</th>
                    <th>@lang('employees.company')</th>
                    <th>@lang('employees.email')</th>
                    <th>@lang('employees.phone')</th>
                    <th style="text-align:center;">@lang('global.options')</th>
                </tr>
            </thead>
            <tbody>
                @if($employees->count() > 0)
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>@if($employee->company) {{ $employee->company->name }} @endif</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td style="text-align:center;">
                                <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-sm btn-success">@lang('global.edit')</a> 
                                <a href="{{route('employees.show',$employee->id)}}" class="btn btn-sm btn-danger">@lang('global.delete')</a> 
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr style="text-align:center;">
                        <td colspan="6">@lang('global.no_records_found')</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{ $employees->links() }}
    </div>
</div>
@stop