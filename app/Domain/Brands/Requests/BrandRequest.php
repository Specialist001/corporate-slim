<?php

namespace App\Domain\Brands\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,bmp,png',
            'order' => 'nullable|integer|min:0',
            'active' => 'nullable|boolean',
            'on_main' => 'nullable|boolean'
        ];
    }
}
