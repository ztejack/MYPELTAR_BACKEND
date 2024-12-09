<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatecategoryRequest extends FormRequest
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

    public function customrule($categoryId = null)
    {
        $rule = [
            'category' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // Get the current category being updated
                    $category = Category::find($this->route('category')->id);
                    if (!$category) {
                        $fail('Category not found.');
                        return;
                    }

                    // Get the subsatker ID from the current category
                    $subsatkerId = $category->id_subsatker;

                    // Check if another category with the same name and subsatker exists, excluding the current category
                    $existingCategory = Category::where('category', $value)
                    ->where('id_subsatker', $subsatkerId)
                        ->where('id', '!=', $this->route('category')->id) // Exclude current category
                        ->first();

                    if ($existingCategory) {
                        $fail('The Category ' . $value . ' already exists for the given subsatker.');
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
