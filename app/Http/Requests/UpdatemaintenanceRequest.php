<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatemaintenanceRequest extends FormRequest
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
        $rule = [
            'id_asset' => 'required',
            'id_type' => 'required',
            'deskripsi' => 'string',
            'fotobefore' => 'image|mimes:jpeg,png,jpg|max:2048',
            'fotoafter' => 'image|mimes:jpeg,png,jpg|max:2048',

        ];
        return $rule;
    }
}
