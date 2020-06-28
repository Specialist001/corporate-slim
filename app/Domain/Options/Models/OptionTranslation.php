<?php

namespace App\Domain\Options\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Options\Model\OptionTranslation
 *
 * @property int $id
 * @property int $option_id
 * @property string|null $name
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\OptionTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\OptionTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\OptionTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\OptionTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\OptionTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\OptionTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Models\OptionTranslation whereOptionId($value)
 * @mixin \Eloquent
 */
class OptionTranslation extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];
}
