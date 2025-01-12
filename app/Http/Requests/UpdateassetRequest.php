<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

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
        $rules = [
            'stockcode' => 'required|string',
            'serialnumber' =>
            [
                'required',
                'string',
                Rule::unique('assets')->ignore($this->route('asset')), // Exclude current asset
            ],
            'asset_name' => 'required|string',
            'brand' => 'string',
            'model' => 'string',
            'specifications' => 'string',
            'description' => 'string',
            'id_location' => 'integer',
            'id_category' => 'array',
            'id_status' => 'required',
        ];
        if (!is_null($this->input('image'))) {
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
