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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductImage whereMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductImage whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductImage whereUrl($value)
 * @mixin \Eloquent
 */
class ProductImage extends Model
{
    //
}
