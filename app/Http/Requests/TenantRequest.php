<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',       
            'email' => '',
            'phone' => '',
            'house_id' => 'required',
            'image' => '',
            'nid' => '',
            'flat_id' => '',
            'move_in_date' => '',
            'move_out_date' => 'nullable|date|after:move_in_date',
        ];
    }
}
