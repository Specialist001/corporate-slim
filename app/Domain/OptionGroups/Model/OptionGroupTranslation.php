<?php

namespace App\Domain\OptionGroups\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\OptionGroups\Model\OptionGroupTranslation
 *
 * @property int $id
 * @property int $option_group_id
 * @property string|null $title
 * @property string|null $short
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroupTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroupTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroupTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroupTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroupTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroupTranslation whereOptionGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroupTranslation whereShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroupTranslation whereTitle($value)
 * @mixin \Eloquent
 */
class OptionGroupTranslation extends Model
{
    //
}
