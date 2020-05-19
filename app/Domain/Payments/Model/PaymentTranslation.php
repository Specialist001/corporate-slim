<?php

namespace App\Domain\Payments\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Payments\Model\PaymentTranslation
 *
 * @property int $id
 * @property int $payment_id
 * @property string|null $title
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Payments\Model\PaymentTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Payments\Model\PaymentTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Payments\Model\PaymentTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Payments\Model\PaymentTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Payments\Model\PaymentTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Payments\Model\PaymentTranslation wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Payments\Model\PaymentTranslation whereTitle($value)
 * @mixin \Eloquent
 */
class PaymentTranslation extends Model
{
    //
}
