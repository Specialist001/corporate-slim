<?php

namespace App\Domain\Payments\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Payments\Model\Payment
 *
 * @property int $id
 * @property string|null $logo
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Payments\Model\Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Payments\Model\Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Payments\Model\Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Payments\Model\Payment whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Payments\Model\Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Payments\Model\Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Payments\Model\Payment whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Payments\Model\Payment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Payment extends Model
{
    //
}
