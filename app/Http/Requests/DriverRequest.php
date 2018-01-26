<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => "required|string",
            'name' => "required|string|min:2",
            'car_brand' => "required|string|min:2",
            'car_number' => "required|string|min:2",
            'car_type' => "required|string|in:Фура,Тир,Прицеп,Самосвал",
            'personal_phone' => "required|string",
            'company' => "required|string|min:2",
            'coordinates' => "required|string|min:2",
            'additional' => "required|string|min:0",
            'status' => "sometimes|string|in:FREE,GO TO LOAD POINT,GO TO UNLOAD POINT",
            'active' => "sometimes|numeric|in:1,0",
        ];
    }
}
