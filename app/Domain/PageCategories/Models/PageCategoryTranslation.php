<?php


namespace App\Domain\PageCategories\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\PageCategories\Models\PageCategoryTranslation
 *
 * @property int $id
 * @property int $page_category_id
 * @property string|null $name
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategoryTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategoryTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategoryTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategoryTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategoryTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategoryTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\PageCategories\Models\PageCategoryTranslation wherePageCategoryId($value)
 * @mixin \Eloquent
 */
class PageCategoryTranslation extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];
}
