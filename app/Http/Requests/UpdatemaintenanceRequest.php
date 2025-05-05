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
        $rules['status_id'] = [
            'required',
            function ($attribute, $value, $fail) {
                $status = Status::find($value);

                if (!$status) {
                    $fail("The selected {$attribute} is not found.");
                    return;
                }

                if (!in_array($status->statustype, ['MTNC', 'UNIVER'])) {
                    $fail("The selected {$attribute} is invalid or not allowed for this type.");
                }
            }
        ];

        $rules['imagebefore'] = 'nullable|mimes:jpeg,png,jpg|max:2048';
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
