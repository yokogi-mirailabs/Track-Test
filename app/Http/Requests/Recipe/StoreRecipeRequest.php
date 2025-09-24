<?php

namespace App\Http\Requests\Recipe;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:100',
            'making_time' => 'required|string|max:100',
            'serves' => 'required|string|max:100',
            'ingredients' => 'required|string|max:300',
            'cost' => 'required|integer',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = [
            'message' => 'Recipe creation failed!',
            'required' => 'title, making_time, serves, ingredients, cost'
        ];

        throw new HttpResponseException(
            response()->json($response, 200)
        );
    }
}
