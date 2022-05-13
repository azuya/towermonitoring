<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTowerAPIRequest extends FormRequest
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
            'code' => ['nullable', 'string', 'unique:towers,code,'.$this->route('tower')],
            'owner_id' => ['nullable', 'exists:owner_towers,id'],
            'latlng' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
