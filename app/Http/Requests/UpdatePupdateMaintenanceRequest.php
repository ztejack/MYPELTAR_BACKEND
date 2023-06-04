<?php

namespace App\Http\Requests;

use App\Models\Maintenance;
use App\Models\PUpdate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePupdateMaintenanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $maintenance = Maintenance::findOrFail($this->route('maintenance'));
        $pUpdate = PUpdate::findOrFail($this->route('pupdate'));
        return $maintenance->id === $pUpdate->id_maintenance;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        if (!is_null($this->input('image'))) {
            $rules['image'] = 'image|mimes:jpeg,png,jpg|max:2048';
        } else {
            $rules['image'] = '';
        }
        $rules['id_status'] = 'required';
        $rules['deskripsi_update'] = 'required|string';
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
