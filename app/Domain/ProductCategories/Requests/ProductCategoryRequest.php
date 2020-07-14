<?php

namespace App\Domain\ProductCategories\Requests;

use App\Services\TranslationService\TranslationsRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
            'parent_id' => 'nullable|exists:product_categories,id',
            'active' => 'required|boolean',
            'order' => 'nullable|integer',
            'on_main' => 'nullable|boolean',
            'slug' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,bmp,png',
            'icon' => 'nullable|image|mimes:jpeg,bmp,png',

            'translations' => ['required', new TranslationsRule()],
            'translations.'.\LaravelLocalization::getDefaultLocale().'.title' => 'required|max:255',

            'translations.*.title' => 'max:255',
            'translations.*.short' => 'nullable|string|max:255',

            'translations.*.meta_title' => 'max:255',
            'translations.*.meta_keywords' => 'nullable|string|max:255',
            'translations.*.meta_description' => 'nullable|string|max:255',
        ];
    }
}
