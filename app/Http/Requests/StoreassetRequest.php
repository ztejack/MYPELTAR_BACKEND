<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        //     try {
        //         $input = $this->validate($request, [
        //             'stockcode' => 'required|string',
        //             'serialnumber' => 'required',
        //             'nama_asset' => 'min:6',
        //             'merk' => 'required|string',
        //             'model' => 'string',
        //             'spesifikasi' => 'string',
        //             'deskripsi' => 'string',
        //             'id_lokasi' => 'integer',
        //             'id_kategori' => 'array',
        //         ]);
        //     } catch (ValidationException $e) {
        //         return response()->json($e->errors(), 201);
        //     }
        // }

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
