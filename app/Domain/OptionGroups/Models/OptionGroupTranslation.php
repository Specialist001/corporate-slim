<?php

namespace App\Domain\OptionGroups\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\OptionGroups\Model\OptionGroupTranslation
 *
 * @property int $id
 * @property int $option_group_id
 * @property string|null $title
 * @property string|null $short
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroupTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroupTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroupTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroupTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroupTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroupTranslation whereOptionGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroupTranslation whereShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Models\OptionGroupTranslation whereTitle($value)
 * @mixin \Eloquent
 */
class OptionGroupTranslation extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];
}
