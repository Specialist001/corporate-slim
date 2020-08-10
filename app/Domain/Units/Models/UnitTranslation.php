<?php

namespace App\Domain\Units\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Units\Model\UnitTranslation
 *
 * @property int $id
 * @property int $unit_id
 * @property string|null $name
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\UnitTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\UnitTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\UnitTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\UnitTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\UnitTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\UnitTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\UnitTranslation whereUnitId($value)
 * @mixin \Eloquent
 */
class UnitTranslation extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];
}
