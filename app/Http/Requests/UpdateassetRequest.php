<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateassetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // } 

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
        $rule = [
            'stockcode' => 'required|string',
            // 'code_ast' => 'required|string',
            'serialnumber' => 'required',
            'nama_asset' => 'min:6',
            'merk' => 'required|string',
            'model' => 'string',
            'spesifikasi' => 'string',
            'deskripsi' => 'string',
            'id_lokasi' => 'integer',
            'id_kategori' => 'array',
            'id_status' => 'integer',
        ];
        return $rule;
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
