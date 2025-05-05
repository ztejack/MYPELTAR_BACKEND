<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateuserRequest extends FormRequest
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
        $userId = $this->route('user')->id;
        $rule = [
            'name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
                'string',
            ],
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore($userId),
                'string',
            ],
            'id_satker' => 'required|exists:satkers,id',
            'id_divisi' => 'required|exists:divisis,id',
        ];
        if (!is_null($this->input('id_role'))) {
            $rule['id_role'] = 'not_in:1';
        } else {
            $rule['id_role'] = '';
        }
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
