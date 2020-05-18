<?php

namespace App\Domain\Brands\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\FilterService\Filterable;

class Brand extends Model
{
    use Filterable;
    
    protected $guarded = ['id'];

    public function isActive()
    {
        return $this->active === 1;
    }
}
