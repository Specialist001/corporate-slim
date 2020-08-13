<?php

namespace App\Domain\Products\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Products\Model\ProductImage
 *
 * @property int $id
 * @property int $product_id
 * @property int $main
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductImage whereMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductImage whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductImage whereUrl($value)
 * @mixin \Eloquent
 * @property-read \App\Domain\Products\Models\Product $product
 */
class ProductImage extends Model
{
    protected $guarded = ['id'];

    protected static $imagePath = 'uploads/products/';

    public static function getImagePath()
    {
        return self::$imagePath;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
