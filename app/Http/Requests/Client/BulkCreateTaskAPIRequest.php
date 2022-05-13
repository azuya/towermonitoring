<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateTaskAPIRequest extends FormRequest
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
            'data.*.title' => ['nullable', 'string'],
            'data.*.tower_id' => ['nullable', 'exists:towers,id'],
            'data.*.tgl_maintenance' => ['nullable', 'date'],
            'data.*.user_id' => ['nullable', 'exists:users,id'],
            'data.*.description' => ['nullable', 'string'],
            'data.*.attachments' => ['nullable', 'string'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.date' => ['nullable'],
            'data.*.due_date' => ['nullable'],
            'data.*.completed_by' => ['nullable', 'integer', 'exists:users,id'],
            'data.*.completed_at' => ['nullable'],
            'data.*.is_active' => ['nullable', 'boolean'],
        ];
    }
}
