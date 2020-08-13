<?php

namespace App\Domain\Products\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Products\Model\ProductComment
 *
 * @property int $id
 * @property int $product_id
 * @property int|null $user_id
 * @property string|null $text
 * @property int|null $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductComment whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductComment whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductComment whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductComment whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Domain\Products\Models\Product $product
 */
class ProductComment extends Model
{
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
