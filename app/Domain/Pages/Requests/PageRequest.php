<?php


namespace App\Domain\Pages\Requests;


use App\Services\TranslationService\TranslationsRule;
use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'page_category_id' => 'nullable|exists:page_categories,id',
            'type' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,bmp,png',
            'active' => 'nullable|boolean',
            'order' => 'nullable|integer',
            'top' => 'nullable|boolean',
            'system' => 'nullable|boolean',

            'translations' => ['required', new TranslationsRule()],
            'translations.'.\LaravelLocalization::getDefaultLocale().'.title' => 'required|max:255',
            'translations.'.\LaravelLocalization::getDefaultLocale().'.full' => 'required|string',

            'translations.*.title' => 'max:255',
            'translations.*.short' => 'nullable|string|max:255',
            'translations.*.full' => 'nullable|string',

            'translations.*.meta_title' => 'nullable|string|max:255',
            'translations.*.meta_keywords' => 'nullable|string|max:255',
            'translations.*.meta_description' => 'nullable|string|max:255',
        ];
    }
}
