<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFormRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'name' => strip_tags($this->name),
            'email' => strip_tags($this->email),
            'website' => strip_tags($this->website)
        ]);
    }
}