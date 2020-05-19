<?php

namespace App\Domain\Delivery\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\FilterService\Filterable;

/**
 * App\Domain\Delivery\Models\Delivery
 *
 * @property int $id
 * @property string $name
 * @property int|null $price
 * @property int $active
 * @property string|null $emails
 * @property string|null $phones
 * @property string|null $location_lat
 * @property string|null $location_lng
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery filter(\App\Services\FilterService\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery paginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery whereEmails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery whereLocationLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery whereLocationLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery wherePhones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Delivery\Models\Delivery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Delivery extends Model
{
    use Filterable;

    protected $guarded = ['id'];

    public function isActive()
    {
        return $this->active === 1;
    }
}
