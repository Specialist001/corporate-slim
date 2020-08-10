<?php

namespace App\Domain\Products\Models;

use App\Domain\Brands\Models\Brand;
use App\Domain\ProductCategories\Models\ProductCategory;
use App\Domain\Units\Models\Unit;
use App\Services\FilterService\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Products\Model\Product
 *
 * @property int $id
 * @property int $product_category_id
 * @property int|null $brand_id
 * @property int|null $unit_id
 * @property int|null $amount
 * @property int|null $old_price
 * @property int $price
 * @property int|null $warranty
 * @property string|null $sku
 * @property string|null $manufacturer
 * @property string|null $slug
 * @property int $active
 * @property int $on_main
 * @property string|null $wholesale
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereManufacturer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereOnMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereWarranty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereWholesale($value)
 * @mixin \Eloquent
 * @property-read \App\Domain\Brands\Models\Brand $brand
 * @property-read \App\Domain\ProductCategories\Models\ProductCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\Products\Models\ProductComment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\Products\Models\ProductImage[] $images
 * @property-read int|null $images_count
 * @property-read \App\Domain\Products\Models\ProductTranslation $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\Products\Models\ProductTranslation[] $translations
 * @property-read int|null $translations_count
 * @property-read \App\Domain\Units\Models\Unit $unit
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product filter(\App\Services\FilterService\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product orWhereTranslation($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product paginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product whereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\Product withTranslation()
 */
class Product extends Model
{
    use Translatable, Filterable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['title', 'short', 'full', 'meta_title', 'meta_keywords', 'meta_description'];

    protected static $imagePath = 'uploads/products/';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'page_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'page_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(ProductComment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
