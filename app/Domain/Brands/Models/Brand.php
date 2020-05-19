<?php

namespace App\Domain\Brands\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\FilterService\Filterable;

/**
 * App\Domain\Brands\Models\Brand
 *
 * @property int $id
 * @property string $name
 * @property string|null $logo
 * @property int $active
 * @property int $on_main
 * @property int|null $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand filter(\App\Services\FilterService\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand paginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereOnMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Brand extends Model
{
    use Filterable;
    
    protected $guarded = ['id'];

    public function isActive()
    {
        return $this->active === 1;
    }
}
