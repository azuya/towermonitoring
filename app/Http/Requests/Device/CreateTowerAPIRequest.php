<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateTowerAPIRequest extends FormRequest
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
            'code' => ['nullable', 'string', 'unique:towers,code'],
            'owner_id' => ['nullable', 'exists:owner_towers,id'],
            'latlng' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
