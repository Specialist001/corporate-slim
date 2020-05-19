<?php

namespace App\Domain\OptionGroups\Model;

use App\Services\FilterService\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\OptionGroups\Model\OptionGroup
 *
 * @property int $id
 * @property string|null $type
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Domain\OptionGroups\Model\OptionGroupTranslation $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\OptionGroups\Model\OptionGroupTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup filter(\App\Services\FilterService\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup orWhereTranslation($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup paginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup whereTranslationLike($translationField, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\OptionGroups\Model\OptionGroup withTranslation()
 * @mixin \Eloquent
 */
class OptionGroup extends Model
{
    use Translatable, Filterable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['title', 'short', 'full', 'meta_title', 'meta_keywords', 'meta_description'];
}
