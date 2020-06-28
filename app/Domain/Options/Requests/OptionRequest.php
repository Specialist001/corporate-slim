<?php

namespace App\Domain\Options\Requests;

use App\Services\TranslationService\TranslationsRule;
use Illuminate\Foundation\Http\FormRequest;

class OptionRequest extends FormRequest
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
            'option_group_id' => 'required|exists:option_groups,id',
            'type' => 'required|string|max:255',
            'order' => 'nullable|integer',

            'translations' => ['required', new TranslationsRule()],
            'translations.'.\LaravelLocalization::getDefaultLocale().'.name' => 'required|max:255',

            'translations.*.name' => 'max:255',
        ];
    }
}
