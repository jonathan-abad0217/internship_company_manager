<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeForm extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'employee_first_name' => 'required',
            'employee_last_name' => 'required',
            'company_id' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'employee_first_name' => strip_tags($this->employee_first_name),
            'employee_last_name' => strip_tags($this->employee_last_name),
            
            'email' => strip_tags($this->email),
            'phone' => strip_tags($this->phone)
        ]);
    }
}