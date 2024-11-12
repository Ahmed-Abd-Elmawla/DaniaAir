<?php

namespace App\Http\Requests\Web\User\SafetyReports;

use App\Http\Requests\Web\Master;
use Illuminate\Validation\Rule;


class ReportRequest extends Master
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reportItems'      => 'required|array',
            'reportItems.*.item_id' => [
                'required',
                Rule::exists('safety_items', 'id')
            ],
            'reportItems.*.status' => 'required|numeric|in:0,1',
            'reportItems.*.comment' => 'nullable|string|max:250',
            'inspector_name'      => 'required|string',
            'date'      => 'required',
            'time'      => 'required',
        ];
    }
}
