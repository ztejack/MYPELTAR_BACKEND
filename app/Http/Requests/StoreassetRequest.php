<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreassetRequest extends FormRequest
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
            'stockcode' => 'required|string|unique:assets',
            'serialnumber' => 'required|unique:assets',
            'nama_asset' => 'min:6',
            'merk' => 'required|string',
            'model' => 'string',
            'spesifikasi' => 'string',
            'deskripsi' => 'string',
            'id_lokasi' => 'required|integer',
            'id_kategori' => 'required',
            'id_status' => 'required|integer',
        ];
        if ($this->has('image')) {
            $rules['image'] = 'image|mimes:jpeg,png,jpg|max:2048';
        } else {
            $rules['image'] = '';
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
