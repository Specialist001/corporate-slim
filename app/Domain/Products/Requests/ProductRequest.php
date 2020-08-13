<?php

namespace App\Domain\Products\Requests;

use App\Services\TranslationService\TranslationsRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_category_id' => 'required|exists:product_categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'unit_id' => 'nullable|exists:units,id',
            'active' => 'nullable|boolean',
            'on_main' => 'nullable|boolean',
            'amount' => 'nullable|integer',
            'old_price' => 'nullable|integer',
            'price' => 'required|integer',
            'warranty' => 'nullable|integer',
            'sku' => 'nullable|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
            'wholesale' => 'nullable|string',

//            'image' => 'nullable|image|mimes:jpeg,bmp,png',
            'translations' => ['required', new TranslationsRule()],
            'translations.'.\LaravelLocalization::getDefaultLocale().'.title' => 'required|max:255',
            'translations.'.\LaravelLocalization::getDefaultLocale().'.full' => 'required|string',

            'translations.*.title' => 'max:255',
            'translations.*.short' => 'nullable|string|max:255',
            'translations.*.full' => 'nullable|string',

            'translations.*.meta_title' => 'max:255',
            'translations.*.meta_keywords' => 'nullable|string|max:255',
            'translations.*.meta_description' => 'nullable|string|max:255',
        ];
    }
}
