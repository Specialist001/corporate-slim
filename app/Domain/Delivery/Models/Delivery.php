<?php

namespace App\Domain\Delivery\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\FilterService\Filterable;

class Delivery extends Model
{
    use Filterable;

    protected $guarded = ['id'];

    public function isActive()
    {
        return $this->active === 1;
    }
}
