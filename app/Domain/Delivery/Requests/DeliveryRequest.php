<?php

namespace App\Domain\Delivery\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'nullable|integer|min:0',
            'schedule' => 'nullable|text',
            'active' => 'nullable|boolean',
            'emails' => 'nullable|text',
            'phones' => 'nullable|text',
            'location_lat' => 'required|string|max:255',
            'location_lng' => 'required|string|max:255',
        ];
    }
}
