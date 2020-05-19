<?php

namespace App\Domain\Options\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Options\Model\OptionTranslation
 *
 * @property int $id
 * @property int $option_id
 * @property string|null $name
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\OptionTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\OptionTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\OptionTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\OptionTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\OptionTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\OptionTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Options\Model\OptionTranslation whereOptionId($value)
 * @mixin \Eloquent
 */
class OptionTranslation extends Model
{
    //
}
