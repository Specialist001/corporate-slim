<?php

namespace App\Domain\OptionValues\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\OptionValues\Model\OptionValue
 *
 * @property int $id
 * @property int $option_id
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValue whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OptionValue extends Model
{
    use Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name'];
}
