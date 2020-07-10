<?php

namespace App\Domain\OptionValues\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\OptionValues\Model\OptionValue
 *
 * @property int $id
 * @property int $option_id
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Domain\OptionValues\Models\OptionValueTranslation $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\OptionValues\Models\OptionValueTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue orWhereTranslation($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue whereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue withTranslation()
 */
class OptionValue extends Model
{
    use Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name'];
}
