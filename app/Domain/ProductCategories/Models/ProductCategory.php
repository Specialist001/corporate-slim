<?php

namespace App\Domain\ProductCategories\Models;

use App\Domain\OptionGroups\Models\OptionGroup;
use App\Domain\Products\Models\Product;
use App\Services\FilterService\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;

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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory whereOnMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\ProductCategories\Models\ProductCategory[] $children
 * @property-read int|null $children_count
 * @property-read \App\Domain\OptionGroups\Models\OptionGroup $optionGroups
 * @property-read \App\Domain\ProductCategories\Models\ProductCategory|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\Products\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \App\Domain\ProductCategories\Models\ProductCategoryTranslation $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\ProductCategories\Models\ProductCategoryTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory actives()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory filter(\App\Services\FilterService\Filter $filters)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain\ProductCategories\Models\ProductCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory orWhereTranslation($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory paginateFilter($perPage = 20)
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory whereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\ProductCategories\Models\ProductCategory withTranslation()
 * @method static \Illuminate\Database\Query\Builder|\App\Domain\ProductCategories\Models\ProductCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Domain\ProductCategories\Models\ProductCategory withoutTrashed()
 */
class ProductCategory extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    use Translatable, Filterable , SoftDeletes;

    protected $guarded = ['id'];

    public $translatedAttributes = ['title', 'short', 'meta_title', 'meta_keywords', 'meta_description'];

    protected static $imagePath = 'uploads/product_categories/';

    public function isActive()
    {
        return $this->active === 1;
    }

    public static function statuses()
    {
        return [
            static::STATUS_ACTIVE,
            static::STATUS_INACTIVE,
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

    public static function getImagePath()
    {
        return static::$imagePath;
    }

    public function imageUrl()
    {
        if(!$this->image) {
            return asset(config('upload.product_category_image.default'));
        }
        return asset(self::getImagePath().$this->image);
    }

    public function iconUrl()
    {
        if(!$this->icon) {
            return asset(config('upload.product_category_icon.default'));
        }
        return asset(self::getImagePath().$this->icon);
    }

    public function uploadImage(UploadedFile $image)
    {
        $extension = $image->getClientOriginalExtension();
        $filename = $this->id.'_'.uniqid().'.'.$extension;
        \Image::make($image)->fit(config('upload.product_category_image.width'), config('upload.product_category_image.height'))->save(public_path(self::getImagePath().$filename));
        return $filename;
    }

    public function uploadIcon(UploadedFile $image)
    {
        $extension = $image->getClientOriginalExtension();
        $filename = 'icn_'.$this->id.'_'.uniqid().'.'.$extension;
        \Image::make($image)->fit(config('upload.product_category_icon.width'), config('upload.product_category_icon.height'))->save(public_path(self::getImagePath().$filename));
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

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id','id');
    }

    public function children()
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function optionGroups()
    {
        return $this->belongsToMany(OptionGroup::class);
    }

    public function optionGroupsArray()
    {
//        $opt = $this->optionGroups()->get()->toArray();
        $ogpc = \DB::table('option_group_product_category')->where(['product_category_id' => $this->id])->get()->toArray();
        return array_column($ogpc, 'option_group_id');
    }
}
