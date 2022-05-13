<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskAPIRequest extends FormRequest
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
            'title' => ['nullable', 'string'],
            'tower_id' => ['nullable', 'exists:towers,id'],
            'tgl_maintenance' => ['nullable', 'date'],
            'user_id' => ['nullable', 'exists:users,id'],
            'description' => ['nullable', 'string'],
            'attachments' => ['nullable', 'string'],
            'status' => ['nullable', 'integer'],
            'date' => ['nullable'],
            'due_date' => ['nullable'],
            'completed_by' => ['nullable', 'integer', 'exists:users,id'],
            'completed_at' => ['nullable'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
