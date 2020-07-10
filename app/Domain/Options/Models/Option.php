<?php

namespace App\Domain\Options\Models;

use App\Domain\OptionGroups\Models\OptionGroup;
use App\Domain\OptionValues\Models\OptionValue;
use App\Services\FilterService\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Options\Model\Option
 *
 * @property int $id
 * @property int $option_group_id
 * @property int $order
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option whereOptionGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Domain\Options\Models\OptionTranslation $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\Options\Models\OptionTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option filter(\App\Services\FilterService\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option orWhereTranslation($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option paginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option whereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option withTranslation()
 * @property-read \App\Domain\OptionGroups\Models\OptionGroup $optionGroup
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\OptionValues\Models\OptionValue[] $optionValues
 * @property-read int|null $option_values_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option checkbox()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option inputs()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\Option radio()
 */
class Option extends Model
{
    use Translatable, Filterable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name'];

    const TYPE_INPUT = 'input';
    const TYPE_RADIO = 'radio';
    const TYPE_CHECKBOX = 'checkbox';

    /**
     * @return array
     */
    public static function types()
    {
        return [
            static::TYPE_INPUT,
            static::TYPE_RADIO,
            static::TYPE_CHECKBOX,
        ];
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInputs($query)
    {
        return $query->where('type', static::TYPE_INPUT);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRadio($query)
    {
        return $query->where('type', static::TYPE_RADIO);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCheckbox($query)
    {
        return $query->where('type', static::TYPE_CHECKBOX);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function optionGroup()
    {
        return $this->belongsTo(OptionGroup::class)->withTranslation();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function optionValues()
    {
        return $this->hasMany(OptionValue::class);
    }
}
