<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgreementRequest extends FormRequest
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
            'owner_id' => ['required'],
            'sender_origin_and_destinations_id' => ['required'],
            'receiver_origin_and_destinations_id' => ['required'],
            'sender_fence_id' => ['required'],
            'receiver_fence_id' => ['required'],
            'type' => ['required'],
            'import_salary' => ['required'],
            'desamarre' => ['required'],
            'desenlone' => ['required'],
            'voucher' => ['required'],
            'to_load' => ['required'],
            'amarre' => ['required'],
            'enlone' => ['required'],
            'currency' => ['required'],
            'route_id' => ['required'],
        ];
    }
}
