<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class StoreInspeksiRequest extends FormRequest
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
        $rules = [
            'maintenance_needed' => 'required',
            'asset_id' => 'required|exists:assets,id',
            'description' => 'string'
        ];
        if ($this->has('image')) {
            $rules['image'] = 'image|mimes:jpeg,png,jpg|max:2048';
        } else {
            $rules['image'] = '';
        }
        $rules['type_id'] = 'required|string|exists:type_maintenances,id';
        $rules['urgency_id'] = 'required|string|exists:urgency_levels,id';
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
