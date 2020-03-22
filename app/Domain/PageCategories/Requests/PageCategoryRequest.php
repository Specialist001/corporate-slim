<?php


namespace App\Domain\PageCategories\Requests;


use App\Services\TranslationService\TranslationsRule;
use Illuminate\Foundation\Http\FormRequest;

class PageCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'active' => 'nullable|boolean',
            'order' => 'nullable|integer',
            'top' => 'nullable|boolean',
            'bottom' => 'nullable|boolean',

            'translations' => ['required', new TranslationsRule()],
            'translations.'.\LaravelLocalization::getDefaultLocale().'.name' => 'required|max:255',

            'translations.*.name' => 'max:255',
        ];
    }
}
