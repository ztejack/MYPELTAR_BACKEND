<?php

namespace App\Http\Requests;

use App\Models\Maintenance;
use App\Models\PMaintenanceUpdate;
use App\Models\PUpdate;
use App\Models\Status;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateHistoryMaintenanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $maintenance = $this->route('maintenance');
        $pUpdate = $this->route('pupdate');

        return $maintenance->id == $pUpdate->id_maintenance;
        // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        $rules['imagebefore'] = 'nullable|mimes:jpeg,png,jpg|max:2048';
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
        $rules['description'] = 'required|string';
        return $rules;
    }
    // protected function update() {}
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->messages();
        throw new HttpResponseException(response()->json([
            'message' => 'The given data was invalid.',
            'errors' => $errors,
        ], 422));
    }
}
