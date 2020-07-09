<?php

namespace App\Domain\OptionValues\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\OptionValues\Model\OptionValueTranslation
 *
 * @property int $id
 * @property int $option_value_id
 * @property string|null $name
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValueTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValueTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValueTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValueTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValueTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValueTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionValues\Models\OptionValueTranslation whereOptionValueId($value)
 * @mixin \Eloquent
 */
class OptionValueTranslation extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];
}
