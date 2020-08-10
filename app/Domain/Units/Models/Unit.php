<?php

namespace App\Domain\Units\Models;

use App\Domain\Products\Models\Product;
use App\Services\FilterService\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Units\Model\Unit
 *
 * @property int $id
 * @property int $active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit whereId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\Products\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \App\Domain\Units\Models\UnitTranslation $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\Units\Models\UnitTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit filter(\App\Services\FilterService\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit orWhereTranslation($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit paginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit whereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit withTranslation()
 */
class Unit extends Model
{
    use Translatable, Filterable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name'];

    public $timestamps = false;

    public function isActive()
    {
        return $this->active === 1;
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
