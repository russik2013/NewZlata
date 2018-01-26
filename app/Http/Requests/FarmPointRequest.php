<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FarmPointRequest extends FormRequest
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
            'address' => "required|string|min:1",
            'receiver' => "sometimes|in:1,0",
            'sender' => "sometimes|in:1,0",
            'farm_id' => "required|numeric|valid_farm"
        ];
    }
}
