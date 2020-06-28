<?php

namespace App\Domain\ProductCategories\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\ProductCategories\Model\ProductCategoryTranslation
 *
 * @property int $id
 * @property int $product_category_id
 * @property string|null $title
 * @property string|null $short
 * @property string|null $meta_title
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategoryTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategoryTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategoryTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategoryTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategoryTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategoryTranslation whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategoryTranslation whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategoryTranslation whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategoryTranslation whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategoryTranslation whereShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategoryTranslation whereTitle($value)
 * @mixin \Eloquent
 */
class ProductCategoryTranslation extends Model
{
    //
}
