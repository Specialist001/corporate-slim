<?php


namespace App\Domain\ServiceCategories\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\ServiceCategories\Models\ServiceCategoryTranslation
 *
 * @property int $id
 * @property int $service_category_id
 * @property string|null $title
 * @property string|null $short
 * @property string|null $full
 * @property string|null $meta_title
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategoryTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategoryTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategoryTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategoryTranslation whereFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategoryTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategoryTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategoryTranslation whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategoryTranslation whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategoryTranslation whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategoryTranslation whereServiceCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategoryTranslation whereShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategoryTranslation whereTitle($value)
 * @mixin \Eloquent
 */
class ServiceCategoryTranslation extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];
}
