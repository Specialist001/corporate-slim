<?php

namespace App\Domain\Products\Model;

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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereManufacturer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereOnMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereWarranty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\Product whereWholesale($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    //
}
