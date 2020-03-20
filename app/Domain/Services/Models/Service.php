<?php

namespace App\Domain\Services\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domain\ServiceCategories\Models\ServiceCategory;
use Astrotomic\Translatable\Translatable;
use App\Services\FilterService\Filterable;
use Illuminate\Http\UploadedFile;

/**
 * App\Domain\Services\Models\Service
 *
 * @property int $id
 * @property int $service_category_id
 * @property string|null $slug
 * @property int $active
 * @property int|null $order
 * @property string|null $image
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Domain\Services\Models\ServiceTranslation $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\Services\Models\ServiceTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service actives()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service filter(\App\Services\FilterService\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service orWhereTranslation($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service paginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service whereServiceCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service whereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\Service withTranslation()
 * @mixin \Eloquent
 * @property-read \App\Domain\ServiceCategories\Models\ServiceCategory $serviceCategory
 */
class Service extends Model
{
    use Translatable, Filterable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['title', 'short', 'description', 'meta_title', 'meta_keywords', 'meta_description'];

    protected static $imagePath = 'uploads/services/';

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

    public function serviceCategory()
    {
    	return $this->belongsTo(ServiceCategory::class)->withTranslation();
    }

    public static function getImagePath()
    {
        return self::$imagePath;
    }

    public function imageUrl()
    {
        if(!$this->image) {
            return asset(config('upload.service_image.default'));
        }
        return asset(self::getImagePath().$this->image);
    }

    public function iconUrl()
    {
        if(!$this->icon) {
            return asset(config('upload.service_icon.default'));
        }
        return asset(self::getImagePath().$this->icon);
    }

    public function uploadImage(UploadedFile $image)
    {
        $extension = $image->getClientOriginalExtension();
        $filename = $this->id.'_'.uniqid().'.'.$extension;
        \Image::make($image)->fit(config('upload.service_image.width'), config('upload.service_image.height'))->save(public_path(self::getImagePath().$filename));
        return $filename;
    }

    public function uploadIcon(UploadedFile $image)
    {
        $extension = $image->getClientOriginalExtension();
        $filename = 'icn_'.$this->id.'_'.uniqid().'.'.$extension;
        \Image::make($image)->fit(config('upload.service_icon.width'), config('upload.service_icon.height'))->save(public_path(self::getImagePath().$filename));
        return $filename;
    }

    public function deleteImage()
    {
        $imagePath = public_path(self::getImagePath().$this->image);
        if ($this->image != '' && file_exists($imagePath)) {
            unlink($imagePath);
        }
        $this->image = null;
    }

    public function deleteIcon()
    {
        $iconPath = public_path(self::getImagePath().$this->icon);
        if ($this->icon != '' && file_exists($iconPath)) {
            unlink($iconPath);
        }
        $this->icon = null;
    }
}
