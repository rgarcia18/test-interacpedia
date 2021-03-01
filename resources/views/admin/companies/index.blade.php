@extends('adminlte::page')
@section('title',trans('companies.companies'))
@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>
            <i class="fas fa-building" style="margin:10px 10px 10px 10px;"></i>@lang('companies.companies')
        </h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">@lang('global.dashboard')</a></li>
            <li class="breadcrumb-item active">@lang('companies.companies')</li>
        </ol>
    </div>
</div>
@stop
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <a href="{{route('companies.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> @lang('global.create')</a>           
        </div>
    </div>
    <div class="card-body">          
        <table class="table table-bordered table-responsive-lg">
            <thead>
                <tr>
                    <th>@lang('companies.name')</th>
                    <th>@lang('companies.address')</th>
                    <th>@lang('companies.website')</th>
                    <th>@lang('companies.email')</th>
                    <th style="text-align:center;">@lang('global.options')</th>
                </tr>
            </thead>
            <tbody>
                @if($companies->count() > 0)
                    @foreach($companies as $company)
                        <tr>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->address }}</td>
                            <td>{{ $company->website }}</td>
                            <td>{{ $company->email }}</td>
                            <td style="text-align:center;">
                                <a href="{{route('companies.edit',$company->id)}}" class="btn btn-sm btn-success">@lang('global.edit')</a> 
                                <a href="{{route('companies.show',$company->id)}}" class="btn btn-sm btn-danger">@lang('global.delete')</a> 
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr style="text-align:center;">
                        <td colspan="5">@lang('global.no_records_found')</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{ $companies->links() }}
    </div>
</div>
@stop