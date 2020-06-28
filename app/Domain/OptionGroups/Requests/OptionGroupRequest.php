<?php

namespace App\Domain\OptionGroups\Requests;

use App\Services\TranslationService\TranslationsRule;
use Illuminate\Foundation\Http\FormRequest;

class OptionGroupRequest extends FormRequest
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
            'type' => 'required|string|max:255',
            'active' => 'nullable|boolean',

            'translations' => ['required', new TranslationsRule()],
            'translations.'.\LaravelLocalization::getDefaultLocale().'.title' => 'required|max:255',
            'translations.'.\LaravelLocalization::getDefaultLocale().'.short' => 'nullable|string',

            'translations.*.title' => 'max:255',
            'translations.*.short' => 'nullable|string',
        ];
    }
}
