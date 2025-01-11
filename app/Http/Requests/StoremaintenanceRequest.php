<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

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
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user has the "Inspeksi" role
        // if (!$user || !$user->hasRole('Maintenance')) {
        //     // Optionally throw a custom validation error or return a response if the role is not "Inspeksi"
        //     abort(403, 'Unauthorized. You do not have the required role.');
        // }
        $rules = [
            'asset_id' => 'required|exists:assets,id',
            'description' => 'string'
        ];
        if ($this->has('imagebefore')) {
            $rules['imagebefore'] = 'image|mimes:jpeg,png,jpg|max:2048';
        } else {
            $rules['imagebefore'] = '';
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
