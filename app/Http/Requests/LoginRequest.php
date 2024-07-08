<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;


class LoginRequest extends FormRequest
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
        return [
            'login' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $exists = \App\Models\User::where('email', $value)->exists();
                        if (!$exists) {
                            $fail('Wrong Email');
                        }
                    } else {
                        $exists = \App\Models\User::where('username', $value)->exists();
                        if (!$exists) {
                            $fail('Wrong Username');
                        }
                    }
                },
            ],
            'password' => 'required|string',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->all();
        throw new HttpResponseException(response()->json([
            'status' => 'fails',
            'message' => $errors[0],
        ], 404));
    }
}
