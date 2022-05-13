<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOwnerTowerAPIRequest extends FormRequest
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
            'nama_pt' => ['nullable', 'string'],
            'alamat' => ['nullable', 'string'],
            'email' => ['nullable', 'string'],
            'telp' => ['nullable', 'string'],
            'pic' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
