<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            "name" => ['nullable'],
            "address" => ['nullable'],
            "postal_code" => ['nullable'],
            "state" => ['nullable'],
            "city" => ['nullable'],
            "country" => ['nullable'],
            "area" => ['nullable'],
            "rfc" => ['nullable'],
            "currency" => ['nullable'],
            "bank_account" => ['nullable'],
            "tax_regime" => ['nullable'],
            "payment_type" => ['nullable'],
            "withholding" => ['nullable'],
            "iva_rate" => ['nullable'],
            "ledger_account" => ['nullable'],
            "exterior_number" => ['nullable'],
            "interior_number" => ['nullable'],
        ];
    }
}
