<?php

namespace App\Domain\Brands\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\FilterService\Filterable;
use Illuminate\Http\UploadedFile;

/**
 * App\Domain\Brands\Models\Brand
 *
 * @property int $id
 * @property string $name
 * @property string|null $logo
 * @property int $active
 * @property int $on_main
 * @property int|null $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand filter(\App\Services\FilterService\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand paginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereOnMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Brands\Models\Brand whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Brand extends Model
{
    use Filterable;

    protected $guarded = ['id'];

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active === 1;
    }

    /**
     * @return bool
     */
    public function isOnMain()
    {
        return $this->on_main === 1;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActives($query)
    {
        return $query->where('active', 1);
    }

    protected static $imagePath = 'uploads/brands/';

    public static function getImagePath()
    {
        return self::$imagePath;
    }

    public function logoUrl()
    {
        if(!$this->logo) {
            return asset(config('upload.brand_logo.default'));
        }
        return asset(static::getImagePath().$this->logo);
    }

    public function uploadLogo(UploadedFile $image)
    {
        $extension = $image->getClientOriginalExtension();
        $filename = $this->id.'_'.uniqid().'.'.$extension;
        \Image::make($image)->fit(config('upload.brand_logo.width'), config('upload.brand_logo.height'))->save(public_path(static::getImagePath().$filename));
        return $filename;
    }

    public function deleteLogo()
    {
        $logoPath = public_path(static::getImagePath().$this->logo);
        if ($this->logo != '' && file_exists($logoPath)) {
            unlink($logoPath);
        }
        $this->logo = null;
    }
}
