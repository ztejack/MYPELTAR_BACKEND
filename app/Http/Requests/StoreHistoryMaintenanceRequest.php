<?php

namespace App\Http\Requests;

use App\Models\Status;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreHistoryMaintenanceRequest extends FormRequest
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
        $rules = [];
        if (!is_null($this->input('image'))) {
            $rules['image'] = 'image|mimes:jpeg,png,jpg|max:2048';
        } else {
            $rules['image'] = '';
        }
        $rules['status_id'] = ['required',  function ($attribute, $value, $fail) {
            $exists = Status::where('id', $value)->whereIn('statustype', ['MTNC', 'UNIVER'])->exists();
            if (!$exists) {
                $fail("The selected {$attribute} is invalid or not allowed for this type.");
            }
        }];
        $rules['description'] = 'required|string';
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
