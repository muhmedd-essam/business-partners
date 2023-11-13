<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updatePartnerRequest extends FormRequest
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
            'partner' => 'required',
            'description' => 'required|min:10',
            'website' => 'required',
            'image' => 'required',
            'profile' => 'required',
            'facebook' => 'required',
            'whatsapp' => 'required|min:8',
            'instagram' => 'required',
            'phone' => 'required|min:8',
        ];
    }
}
