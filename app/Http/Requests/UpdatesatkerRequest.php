<?php

namespace App\Http\Requests;

use App\Models\Satker;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatesatkerRequest extends FormRequest
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
        return $this->customrule();
    }
    public function customrule()
    {
        $rule = [
            'satker_name' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // Check if the role with this satker already exists
                    if (Satker::where('satker', $value)->exists()) {
                        $fail('The satker name ' . $value . ' already exists.');
                    }
                }
            ],
        ];
        return $rule;
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
