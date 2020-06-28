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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductComment whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductComment whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductComment whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductComment whereUserId($value)
 * @mixin \Eloquent
 */
class ProductComment extends Model
{
    //
}
