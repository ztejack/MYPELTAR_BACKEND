<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
}
