<?php

namespace App\Domain\Orders\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Orders\Model\Order
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $pay_method
 * @property int $delivery_type
 * @property int|null $delivery_id
 * @property int|null $delivery_price
 * @property int $sum
 * @property string $name
 * @property string $phone
 * @property string|null $email
 * @property string $address
 * @property string|null $comment
 * @property int $pay_status
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order whereDeliveryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order whereDeliveryPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order whereDeliveryType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order wherePayMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order wherePayStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Orders\Model\Order whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    //
}
