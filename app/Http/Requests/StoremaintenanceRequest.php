<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoremaintenanceRequest extends FormRequest
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
        $rules = [];
        if (!is_null($this->input('imagebefore'))) {
            $rules['imagebefore'] = 'image|mimes:jpeg,png,jpg|max:2048';
        } else {
            $rules['imagebefore'] = '';
        }
        $rules['id_asset'] = 'required';
        $rules['id_type'] = 'required';
        $rules['deskripsi'] = 'string';
        $rules['imageafter'] = '';
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
