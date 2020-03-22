<?php


namespace App\Domain\Pages\Models;


use App\Services\FilterService\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * App\Domain\Pages\Models\Page
 *
 * @property int $id
 * @property int|null $page_category_id
 * @property string|null $type
 * @property string|null $slug
 * @property string|null $image
 * @property string|null $thumb
 * @property int $active
 * @property int $order
 * @property int $top
 * @property int $system
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Domain\Pages\Models\PageTranslation $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\Pages\Models\PageTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page actives()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page filter(\App\Services\FilterService\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page orWhereTranslation($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page paginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page wherePageCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page whereSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page whereTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page whereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Pages\Models\Page withTranslation()
 * @mixin \Eloquent
 */
class Page extends Model
{
    use Filterable, Translatable;

    const TYPE_PAGE = 'page';
    const TYPE_VACANCY = 'vacancy';

    protected $guarded = ['id'];

    public $translatedAttributes = ['title', 'short', 'full', 'meta_title', 'meta_keywords', 'meta_description'];

    protected static $imagePath = 'uploads/pages/';

    public function isActive()
    {
        return $this->active === 1;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActives($query)
    {
        return $query->where('active', 1);
    }

    public static function types()
    {
        return [
            static::TYPE_PAGE,
            static::TYPE_VACANCY,
        ];
    }

    public static function getImagePath()
    {
        return static::$imagePath;
    }

    public function imageUrl()
    {
        if(!$this->image) {
            return asset(config('upload.page_image.default'));
        }
        return asset(static::getImagePath().$this->image);
    }

    public function thumbUrl()
    {
        if(!$this->thumb) {
            return asset(config('upload.page_thumb.default'));
        }
        return asset(static::getImagePath().$this->thumb);
    }

    public function uploadImage(UploadedFile $image)
    {
        $extension = $image->getClientOriginalExtension();
        $filename = $this->id.'_'.uniqid().'.'.$extension;
        \Image::make($image)->fit(config('upload.page_image.width'), config('upload.page_image.height'))->save(public_path(static::getImagePath().$filename));
        \Image::make($image)->fit(config('upload.page_thumb.width'), config('upload.page_thumb.height'))->save(public_path(static::getImagePath().'th_'.$filename));
        return $filename;
    }

    public function deleteImage()
    {
        $imagePath = public_path(static::getImagePath().$this->image);
        $thumbPath = public_path(static::getImagePath().$this->thumb);
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
