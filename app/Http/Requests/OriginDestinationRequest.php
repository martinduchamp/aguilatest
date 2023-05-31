<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OriginDestinationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'address' => ['required'],
            'street' => ['required'],
            'rfc' => ['required'],
            'postal_code' => ['required'],
            'city' => ['required'],
            'exterior_number' => ['required'],
            'interior_number' => [''],
            'country' => ['required'],
            'state' => ['required'],
        ];
    }
}
