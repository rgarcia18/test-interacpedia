@extends('adminlte::page')
@section('title',trans('companies.create_company'))
@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>
            <i class="fas fa-building" style="margin:10px 10px 10px 10px;"></i>@lang('companies.create_company')
        </h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">@lang('global.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="{{route('companies.index')}}">@lang('companies.companies')</a></li>
            <li class="breadcrumb-item active">@lang('global.create')</li>
        </ol>
    </div>
</div>
@stop
@section('content')
<form class="form form-vertical" action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a href="{{route('companies.index')}}" class="btn btn-info"><i class="fas fa-undo-alt"></i> @lang('global.return')</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> @lang('global.save')</button>        
                </div>
            </div> 
        </div>
        <div class="card-body">   
            <div class="row align-items-end">
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">                    
                    <input type="file" id="file_logo" name="file_logo" class="dropify" data-allowed-file-extensions="jpg jpeg png gif" accept=".jpg,.jpeg,.png,.gif" data-min-height="100" data-min-width="100">
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="name" class="control-label">@lang('companies.name')</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="@lang('companies.name')" required="required">                    
                </div> 
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="email" class="control-label">@lang('companies.email')</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="@lang('companies.email')">                    
                </div>                
            </div>
            <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="address" class="control-label">@lang('companies.address')</label>
                    <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control" placeholder="@lang('companies.address')">                    
                </div>      
                <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <label for="website" class="control-label">@lang('companies.website')</label>
                    <input type="url" id="website" name="website" value="{{ old('website') }}" class="form-control" placeholder="@lang('companies.website')">                    
                </div>                
            </div>            
        </div>
    </div>
</form>
@stop
@section('js')
<script>
$(document).ready(function(){
    $('.dropify').dropify({
        messages:{
            'default':"@lang('global.msg_drag_drop_file_here')",
            'replace':"@lang('global.msg_drag_ddrop_replace')",
            'remove':"@lang('global.remove')",
            'error':"@lang('global.msg_error_drag_drop_file')",
            'imageFormat':"@lang('global.msg_error_img_format_file')"
        },//messages
        error:{
            'fileExtension':"@lang('global.msg_error_format_file')",
            'minHeight': "@lang('global.msg_error_min_height')",
            'minWidth': "@lang('global.msg_error_min_width')"
        }//messages
    });
});
</script>
@endsection