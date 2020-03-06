<?php

namespace App\Domain\News\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\News\Models\NewsTranslation
 *
 * @property int $id
 * @property int $news_id
 * @property string|null $title
 * @property string|null $short
 * @property string|null $full
 * @property string|null $meta_title
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\NewsTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\NewsTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\NewsTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\NewsTranslation whereFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\NewsTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\NewsTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\NewsTranslation whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\NewsTranslation whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\NewsTranslation whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\NewsTranslation whereNewsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\NewsTranslation whereShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\NewsTranslation whereTitle($value)
 * @mixin \Eloquent
 */
class NewsTranslation extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];
}
