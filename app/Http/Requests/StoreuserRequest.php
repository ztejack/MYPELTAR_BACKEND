<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreuserRequest extends FormRequest
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
        return $this->customrule();
    }
    public function customrule()
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|unique:users,email|email',
            'username' => 'required|unique:users,username|string',
            'id_satker' => 'required',
            'id_subsatker' => 'required',
        ];
        // $rules = [];
        if (!is_null($this->input('id_role'))) {
            $rules['id_role'] = 'not_in:1';
        } else {
            $rules['id_role'] = '';
        }
        return $rules;
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->messages();
        throw new HttpResponseException(response()->json([
            'message' => 'The given data was invalid.',
            'errors' => $errors,
        ], 422));
    }
}
