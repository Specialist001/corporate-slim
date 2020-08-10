<?php

namespace App\Domain\Units\Models;

use App\Domain\Products\Models\Product;
use App\Services\FilterService\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Units\Model\Unit
 *
 * @property int $id
 * @property int $active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Units\Models\Unit whereId($value)
 * @mixin \Eloquent
 */
class Unit extends Model
{
    use Translatable, Filterable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name'];

    public function isActive()
    {
        return $this->active === 1;
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
