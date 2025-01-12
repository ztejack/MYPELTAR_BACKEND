<?php

namespace App\Http\Requests;

use App\Models\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateMaintenanceRequest extends FormRequest
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
            'type_id' => 'required|integer|exists:type_maintenances,id',
            'urgency_id' => 'required|integer|exists:urgency_levels,id',
            'description' => 'string',
            // 'status_id' => 'required|string|exists:statuses,id'
        ];
        $rules['status_id'] = function ($attribute, $value, $fail) {
            $exists = Status::where('id', $value)->whereIn('statustype', ['MTNC', 'UNIVER'])->exists();
            if (!$exists) {
                $fail("The selected {$attribute} is invalid or not allowed for this type.");
            }
        };

        if (!is_null($this->input('imagebefore'))) {
            $rules['imagebefore'] = 'image|mimes:jpeg,png,jpg|max:2048';
        } else {
            $rules['imagebefore'] = '';
        }
        return $rules;
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->messages();
        throw new HttpResponseException(response()->json([
            'message' => 'The given data was invalid.',
            'errors' => $errors,
        ], 422));
    }

    // /**
    //  * Prepare the data for validation.
    //  *
    //  * @return void
    //  */
    // protected function prepareForValidation()
    // {
    //     // Merge the existing model attributes with the request data
    //     $this->merge($this->route($this->getModelName())->toArray());
    // }
}
