<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() && $this->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'number' => 'required|string|max:50|unique:rooms,number',
            'type' => 'nullable|string|max:100',
            'rate' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:available,reserved,occupied,under_maintenance',
        ];
    }
}
