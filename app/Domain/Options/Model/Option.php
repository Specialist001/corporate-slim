<?php

namespace App\Domain\Options\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Options\Model\Option
 *
 * @property int $id
 * @property int $option_group_id
 * @property int $order
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\Option newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\Option newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\Option query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\Option whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\Option whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\Option whereOptionGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\Option whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\Option whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\Option whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Option extends Model
{
    //
}
