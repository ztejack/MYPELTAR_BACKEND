<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateInspeksiRequest extends FormRequest
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
        return [
            'maintenance_needed' => 'required|boolean', // Assuming this is a boolean
            'asset_id' => 'required|exists:assets,id',
            'description' => 'nullable|string', // Make description optional
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Use nullable for image
            'type_id' => 'required|string|exists:type_maintenances,id',
            'urgency_id' => 'required|string|exists:urgency_levels,id',
        ];
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
