<?php

namespace App\Domain\Orders\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Orders\Model\OrderDetail
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $price
 * @property int $amount
 * @property int $sum
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\OrderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\OrderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\OrderDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\OrderDetail whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\OrderDetail whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\OrderDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\OrderDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\OrderDetail whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\OrderDetail wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\OrderDetail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\OrderDetail whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\OrderDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderDetail extends Model
{
    //
}
