<?php


namespace App\Domain\PageCategories\Models;


use App\Domain\Pages\Models\Page;
use App\Services\FilterService\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\PageCategories\Models\PageCategory
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property int $top
 * @property int $bottom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Domain\PageCategories\Models\PageCategoryTranslation $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\PageCategories\Models\PageCategoryTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory filter(\App\Services\FilterService\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory orWhereTranslation($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory paginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory whereBottom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory whereTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory whereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory withTranslation()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategory actives()
 */
class PageCategory extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    use Translatable, Filterable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name'];

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

    public function pages($query)
    {
        return $this->hasMany(Page::class);
    }

}
