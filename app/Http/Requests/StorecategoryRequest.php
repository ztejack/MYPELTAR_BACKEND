<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'kategori' => 'required|string',
            'id_subsatker' => 'integer'
        ];
        return $rule;
    }
}
