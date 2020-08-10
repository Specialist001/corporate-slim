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
