<?php

namespace App\Http\Requests\Dashboard\SafetyCategories;

use App\Http\Requests\Dashboard\Master;

class SafetyCategoryRequest extends Master
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];

        foreach (config('translatable.locales') as $local) {
            $rules['name.' . $local] = 'required|string|between:2,250';
        }
        return $rules;
    }
}
