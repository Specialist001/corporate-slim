<?php

namespace App\Domain\Products\Model;

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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductTranslation whereFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductTranslation whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductTranslation whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductTranslation whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductTranslation whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductTranslation whereShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Products\Model\ProductTranslation whereTitle($value)
 * @mixin \Eloquent
 */
class ProductTranslation extends Model
{
    //
}
