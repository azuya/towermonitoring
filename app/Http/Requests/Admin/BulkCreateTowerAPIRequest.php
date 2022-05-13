<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateTowerAPIRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'data.*.code' => ['nullable', 'string', 'unique:towers,code'],
            'data.*.owner_id' => ['nullable', 'exists:owner_towers,id'],
            'data.*.latlng' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
