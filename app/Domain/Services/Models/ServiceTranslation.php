<?php

namespace App\Domain\Services\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Services\Models\ServiceTranslation
 *
 * @property int $id
 * @property int $service_id
 * @property string|null $title
 * @property string|null $short
 * @property string|null $description
 * @property string|null $meta_title
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\ServiceTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\ServiceTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\ServiceTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\ServiceTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\ServiceTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\ServiceTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\ServiceTranslation whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\ServiceTranslation whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\ServiceTranslation whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\ServiceTranslation whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\ServiceTranslation whereShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Services\Models\ServiceTranslation whereTitle($value)
 * @mixin \Eloquent
 */
class ServiceTranslation extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];
}
