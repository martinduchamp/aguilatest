<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'vehicle_number' => ['required'],
            'type' => ['required'],
            'plates' => ['required'],
            'brand' => ['required'],
            'vin' => ['required'],
            'model' => ['required'],
            'performance' => ['required'],
            'color' => ['required'],
            'workshop' => ['required'],
            'excelco' => ['required'],
            'energex' => ['required'],
            'gps_id' => ['required'],
            'policy' => ['required']
        ];
    }
}
