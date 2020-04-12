<?php

namespace App\Domain\News\Models;

use App\Services\FilterService\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * App\Domain\News\Models\News
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $slug
 * @property int $views
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Domain\News\Models\NewsTranslation $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\News\Models\NewsTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News filter(\App\Services\FilterService\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News orWhereTranslation($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News paginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News whereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News withTranslation()
 * @mixin \Eloquent
 * @property string $image
 * @property string $thumb
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News actives()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News inActives()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News news()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News promotion()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News whereThumb($value)
 * @property int $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\News\Models\News whereOrder($value)
 */
class News extends Model
{
    use Translatable, Filterable;

    const TYPE_NEWS = 'news';
    const TYPE_PROMOTION = 'promotion';

    protected $guarded = ['id'];

    public $translatedAttributes = ['title', 'short', 'full', 'meta_title', 'meta_keywords', 'meta_description'];

    protected static $imagePath = 'uploads/news/';

    public function isActive()
    {
        return $this->active === 1;
    }

    public static function types()
    {
        return [
            static::TYPE_NEWS,
            static::TYPE_PROMOTION,
        ];
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActives($query)
    {
        return $query->where('active', 1);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInActives($query)
    {
        return $query->where('active', 0);
    }

    public function isNews()
    {
        return $this->type === static::TYPE_NEWS;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNews($query)
    {
        return $query->where('type', static::TYPE_NEWS);
    }

    public function isPromotion()
    {
        return $this->type === static::TYPE_PROMOTION;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePromotion($query)
    {
        return $query->where('type', static::TYPE_PROMOTION);
    }

    public static function getImagePath()
    {
        return self::$imagePath;
    }

    public function imageUrl()
    {
        if(!$this->image) {
            return asset(config('upload.news_image.default'));
        }
        return asset(self::getImagePath().$this->image);
    }

    public function thumbUrl()
    {
        if(!$this->thumb) {
            return asset(config('upload.news_thumb.default'));
        }
        return asset(self::getImagePath().$this->thumb);
    }

    public function uploadImage(UploadedFile $image)
    {
        $extension = $image->getClientOriginalExtension();
        $filename = $this->id.'_'.uniqid().'.'.$extension;
        \Image::make($image)->fit(config('upload.news_image.width'), config('upload.news_image.height'))->save(public_path(self::getImagePath().$filename));
        \Image::make($image)->fit(config('upload.news_thumb.width'), config('upload.news_thumb.height'))->save(public_path(self::getImagePath().'th_'.$filename));
        return $filename;
    }

    public function deleteImage()
    {
        $imagePath = public_path(self::getImagePath().$this->image);
        $thumbPath = public_path(self::getImagePath().$this->thumb);
        if ($this->image != '' && file_exists($imagePath)) {
            unlink($imagePath);
        }
        if ($this->thumb != '' && file_exists($thumbPath)) {
            unlink($thumbPath);
        }
        $this->image = null;
        $this->thumb = null;
    }
}
