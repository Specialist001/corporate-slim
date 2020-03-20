<?php

namespace App\Domain\ServiceCategories\Models;


use App\Domain\Services\Models\Service;
use App\Services\FilterService\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Domain\ServiceCategories\Models\ServiceCategory
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $slug
 * @property string|null $type
 * @property int $active
 * @property int|null $order
 * @property string|null $image
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Domain\ServiceCategories\Models\ServiceCategoryTranslation $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\ServiceCategories\Models\ServiceCategoryTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory actives()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory filter(\App\Services\FilterService\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory orWhereTranslation($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory paginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory whereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory withTranslation()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\ServiceCategories\Models\ServiceCategory[] $children
 * @property-read int|null $children_count
 * @property-read \App\Domain\ServiceCategories\Models\ServiceCategory $parent
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Domain\ServiceCategories\Models\ServiceCategory withoutTrashed()
 */
class ServiceCategory extends Model
{
    use Translatable, Filterable , SoftDeletes;

    protected $guarded = ['id'];

    public $translatedAttributes = ['title', 'short', 'full', 'meta_title', 'meta_keywords', 'meta_description'];

    protected static $imagePath = 'uploads/service_categories/';

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

    public function children()
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id','id');
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public static function getImagePath()
    {
        return self::$imagePath;
    }

    public function imageUrl()
    {
        if(!$this->image) {
            return asset(config('upload.service_category_image.default'));
        }
        return asset(self::getImagePath().$this->image);
    }

    public function iconUrl()
    {
        if(!$this->icon) {
            return asset(config('upload.service_category_icon.default'));
        }
        return asset(self::getImagePath().$this->icon);
    }

    public function uploadImage(UploadedFile $image)
    {
        $extension = $image->getClientOriginalExtension();
        $filename = $this->id.'_'.uniqid().'.'.$extension;
        \Image::make($image)->fit(config('upload.service_category_image.width'), config('upload.service_category_image.height'))->save(public_path(self::getImagePath().$filename));
        return $filename;
    }

    public function uploadIcon(UploadedFile $image)
    {
        $extension = $image->getClientOriginalExtension();
        $filename = 'icn_'.$this->id.'_'.uniqid().'.'.$extension;
        \Image::make($image)->fit(config('upload.service_category_icon.width'), config('upload.service_category_icon.height'))->save(public_path(self::getImagePath().$filename));
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
