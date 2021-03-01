<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeesRequest extends FormRequest
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
            'first_name' => 'required|max:250',
            'last_name' => 'required|max:250',
            'email' => 'nullable|max:250|email',          
            'company_id' => 'nullable|numeric',
            'phone' => 'nullable|string|max:250', 
        ];
    }

    /**
     * Get the error messages from the validation that apply to the request.
     *
     * @return array
     */
    public function messages(){
        
        return [
            'first_name.required' => trans('validation.required'),
            'first_name.max' => trans('validation.max.string'),  
            'last_name.required' => trans('validation.required'),
            'last_name.max' => trans('validation.max.string'),  
            'email.email' => trans('validation.email'),
            'email.max' => trans('validation.max.string'),
            'company_id.numeric' => trans('validation.numeric'),
            'phone.max' => trans('validation.max.string'),
        ];
    }

     /**
     * Get the custom names of the attributes.
     *
     * @return array
     */
    public function attributes(){
        
        return [
            'first_name' => trans('employees.first_name'),
            'last_name' => trans('employees.last_name'),
            'company_id' => trans('employees.company'),
            'email' => trans('employees.email'),
            'phone' => trans('employees.phone'),            
        ];
    }
}
