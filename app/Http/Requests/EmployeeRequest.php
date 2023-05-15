<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:12|min:10|unique:employees',
            'supermarket_id' => 'required',
            'type' => 'required',
            'manager_id' => 'required',
            'gender' => 'required',
        ];

    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));

    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'type.required' => 'Employee type is required',
            'gender.required' => 'Gender is required',
            'supermarket_id.required' => 'Supermarket is required',
            'manager_id.required' => 'Manager is required',
            'phone.required' => 'Phone is required'
        ];

    }
}
