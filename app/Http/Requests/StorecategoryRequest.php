<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorecategoryRequest extends FormRequest
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
            'category' => ['required', 'string', function ($attribute, $value, $fail) {
                // Check if a category with the same name and subsatker exists
                $subsatkerId = request()->input('subsatker'); // Get the subsatker ID from the request

                if (Category::where('category', $value)->where('id_subsatker', $subsatkerId)->exists()) {
                    $fail('The Category ' . $value . ' already exists for the given subsatker.');
                }
            }],
            'subsatker' => 'required|integer'
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
