<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompaniesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        
        return [
            'name' => 'required|max:250',
            'email' => 'nullable|max:250|email',          
            'address' => 'nullable|string|max:250',
            'website' => 'nullable|string|max:250',
            'file_logo' => 'nullable|mimes:jpg,jpeg,gif,png,bmp',
            
            
        ];
    }

    /**
     * Get the error messages from the validation that apply to the request.
     *
     * @return array
     */
    public function messages(){
        
        return [
            'name.max' => trans('validation.max.string'),  
            'email.email' => trans('validation.email'),
            'email.max' => trans('validation.max.string'),
            'address.max' => trans('validation.max.string'),
            'file_photo.mimes' => trans('validation.mimes'),           
        ];
    }

     /**
     * Get the custom names of the attributes.
     *
     * @return array
     */
    public function attributes(){
        
        return [
            'name' => trans('companies.name'),
            'email' => trans('companies.email'),
            'address' => trans('companies.address'),
            'website' => trans('companies.website'),
            'file_photo' => trans('companies.logo'),            
        ];
    }
}
