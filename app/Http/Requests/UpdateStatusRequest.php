<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateStatusRequest extends FormRequest
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
            'status' => 'required',
            'statustype' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value !== 'ASST' && $value !== 'MTNC' && $value !== 'UNVER') {
                        $fail('The field1 must be either "ASST", "MTNC" or "UNVER".');
                    }
                },
                'string'
            ],
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

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $status = $this->route('status');
            if ($status && in_array($status->id, [1, 2, 3, 4, 5, 6])) {
                $validator->errors()->add('id', 'The operation is not allowed for Status ID.');
            }
        });
    }
}
