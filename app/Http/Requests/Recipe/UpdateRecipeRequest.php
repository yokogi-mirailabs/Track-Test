<?php

namespace App\Http\Requests\Recipe;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecipeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:100',
            'making_time' => 'sometimes|string|max:100',
            'serves' => 'sometimes|string|max:100',
            'ingredients' => 'sometimes|string|max:300',
            'cost' => 'sometimes|integer',
        ];
    }
}
