<?php

namespace App\Domain\Products\Models;

use App\Domain\Options\Models\Option;
use App\Domain\OptionValues\Models\OptionValue;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Products\Models\ProductOption
 *
 * @property int $product_id
 * @property int $option_id
 * @property int $option_value_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductOption whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductOption whereOptionValueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductOption whereProductId($value)
 * @mixin \Eloquent
 */
class ProductOption extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function optionValue()
    {
        return $this->belongsTo(OptionValue::class);
    }
}
