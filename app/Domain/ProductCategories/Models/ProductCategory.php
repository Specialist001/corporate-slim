<?php

namespace App\Domain\ProductCategories\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\ProductCategories\Model\ProductCategory
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $slug
 * @property int $active
 * @property int $on_main
 * @property int|null $order
 * @property string|null $image
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategory whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategory whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategory whereOnMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategory whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Model\ProductCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductCategory extends Model
{
    //
}
