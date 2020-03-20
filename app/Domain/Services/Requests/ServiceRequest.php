<?php


namespace App\Domain\Services\Requests;


use App\Services\TranslationService\TranslationsRule;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'service_category_id' => 'required|exists:service_categories,id',
            'active' => 'nullable|boolean',
            'order' => 'nullable|integer',
            'slug' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,bmp,png',
            'icon' => 'nullable|image|mimes:jpeg,bmp,png',

            'translations' => ['required', new TranslationsRule()],
            'translations.'.\LaravelLocalization::getDefaultLocale().'.title' => 'required|max:255',
            'translations.'.\LaravelLocalization::getDefaultLocale().'.description' => 'required|string',

            'translations.*.title' => 'max:255',
            'translations.*.short' => 'nullable|string|max:255',
            'translations.*.description' => 'nullable|string',

            'translations.*.meta_title' => 'max:255',
            'translations.*.meta_keywords' => 'nullable|string|max:255',
            'translations.*.meta_description' => 'nullable|string|max:255',
        ];
    }
}
