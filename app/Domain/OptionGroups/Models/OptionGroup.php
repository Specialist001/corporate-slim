<?php

namespace App\Domain\OptionGroups\Models;

use App\Domain\Options\Models\Option;
use App\Domain\ProductCategories\Models\ProductCategory;
use App\Services\FilterService\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\OptionGroups\Model\OptionGroup
 *
 * @property int $id
 * @property string|null $type
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Domain\OptionGroups\Models\OptionGroupTranslation $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\OptionGroups\Models\OptionGroupTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup filter(\App\Services\FilterService\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup orWhereTranslation($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup paginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup whereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup withTranslation()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\Options\Models\Option[] $options
 * @property-read int|null $options_count
 * @property-read \App\Domain\ProductCategories\Models\ProductCategory $productCategories
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroup actives()
 */
class OptionGroup extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    use Translatable, Filterable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['title', 'short'];

    public function isActive()
    {
        return $this->active === 1;
    }

    public static function statuses()
    {
        return [
            static::STATUS_ACTIVE,
            static::STATUS_INACTIVE,
        ];
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActives($query)
    {
        return $query->where('active', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function productCategories()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
