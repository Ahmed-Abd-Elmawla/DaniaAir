<?php

namespace App\Http\Requests\Dashboard\SafetyItems;

use App\Http\Requests\Dashboard\Master;

class SafetyItemsUpdateRequest extends Master
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'category_id' => ['required', 'string', 'exists:safety_categories,id'],
        ];

        foreach (config('translatable.locales') as $local) {
            $rules['item_desc.' . $local] = 'required|string|between:2,500';
        }
        return $rules;
    }
}
