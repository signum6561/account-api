<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAccountRequest extends FormRequest
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
            'email' => ['sometimes', 'required'],
            'username' => ['required'],
            'fullname' => ['required'],
            'department' => ['required', Rule::in(['Sales', 'Marketing', 'Software'])],
            'position' => ['required', Rule::in(['Dev', 'Sale'])],
            'createAt' => ['required'],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'fake_create_at' => $this->createAt
        ]);
    }
}
