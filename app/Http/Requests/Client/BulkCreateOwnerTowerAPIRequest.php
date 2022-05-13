<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateOwnerTowerAPIRequest extends FormRequest
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
            'data.*.nama_pt' => ['nullable', 'string'],
            'data.*.alamat' => ['nullable', 'string'],
            'data.*.email' => ['nullable', 'string'],
            'data.*.telp' => ['nullable', 'string'],
            'data.*.pic' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
