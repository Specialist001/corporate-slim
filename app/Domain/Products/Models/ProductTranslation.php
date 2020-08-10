<?php

namespace App\Domain\Products\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Products\Model\ProductTranslation
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $title
 * @property string|null $short
 * @property string|null $full
 * @property string|null $meta_title
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductTranslation whereFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductTranslation whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductTranslation whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductTranslation whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductTranslation whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductTranslation whereShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Models\ProductTranslation whereTitle($value)
 * @mixin \Eloquent
 */
class ProductTranslation extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];
}
