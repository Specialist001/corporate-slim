<?php

namespace App\Domain\OptionValues\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\OptionValues\Model\OptionValue
 *
 * @property int $id
 * @property int $option_id
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Model\OptionValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Model\OptionValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Model\OptionValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Model\OptionValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Model\OptionValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Model\OptionValue whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Model\OptionValue whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Model\OptionValue whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OptionValue extends Model
{
    //
}
