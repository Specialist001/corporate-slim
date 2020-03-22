<?php


namespace App\Domain\Pages\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Pages\Models\PageTranslation
 *
 * @property int $id
 * @property int $page_id
 * @property string|null $title
 * @property string|null $short
 * @property string|null $full
 * @property string|null $meta_title
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\PageTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\PageTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\PageTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\PageTranslation whereFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\PageTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\PageTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\PageTranslation whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\PageTranslation whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\PageTranslation whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\PageTranslation wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\PageTranslation whereShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\PageTranslation whereTitle($value)
 * @mixin \Eloquent
 */
class PageTranslation extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];
}
