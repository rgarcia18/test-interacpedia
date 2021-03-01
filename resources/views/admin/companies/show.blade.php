@extends('adminlte::page')
@section('title',trans('companies.delete_company'))
@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>
            <i class="fas fa-building" style="margin:10px 10px 10px 10px;"></i>@lang('companies.delete_company')
        </h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">@lang('global.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="{{route('companies.index')}}">@lang('companies.companies')</a></li>
            <li class="breadcrumb-item active">@lang('global.delete')</li>
        </ol>
    </div>
</div>
@stop
@section('content')
<form class="form form-vertical" id="frm-delete" action="{{route('companies.destroy',$company->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a href="{{route('companies.index')}}" class="btn btn-info"><i class="fas fa-undo-alt"></i> @lang('global.return')</a>
                    <button type="submit" class="btn btn-danger confirm-delete"><i class="fas fa-trash-alt"></i> @lang('global.delete')</button>        
                </div>
            </div> 
        </div>
        <div class="card-body">   
            <div class="row align-items-end">
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">                    
                    <input type="file" id="file_logo" name="file_logo" disabled="disabled" class="dropify" @if($company->logo) data-default-file="{{ asset('storage/'.$company->logo) }}" @endif data-allowed-file-extensions="jpg jpeg png gif" accept=".jpg,.jpeg,.png,.gif" data-min-height="100" data-min-width="100">
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="name" class="control-label">@lang('companies.name')</label>
                    <input type="text" id="name" name="name" disabled="disabled" value="{{ $company->name }}" class="form-control" placeholder="@lang('companies.name')" required="required">                    
                </div> 
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="email" class="control-label">@lang('companies.email')</label>
                    <input type="email" id="email" name="email" disabled="disabled" value="{{ $company->email }}" class="form-control" placeholder="@lang('companies.email')">                    
                </div>                
            </div>
            <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="address" class="control-label">@lang('companies.address')</label>
                    <input type="text" id="address" name="address" disabled="disabled" value="{{ $company->address }}" class="form-control" placeholder="@lang('companies.address')">                    
                </div>      
                <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <label for="website" class="control-label">@lang('companies.website')</label>
                    <input type="url" id="website" name="website" disabled="disabled" value="{{ $company->website }}" class="form-control" placeholder="@lang('companies.website')">                    
                </div>                
            </div>            
        </div>
    </div>
</form>
@stop
@section('js')
<script>
$(document).ready(function(){
    $('.dropify').dropify();
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