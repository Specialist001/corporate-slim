<?php


namespace App\Domain\Pages\Filters;


use App\Services\FilterService\Filter;
use Illuminate\Http\Request;

class PageFilter extends Filter
{
    protected $available = [
        'id',
        'page_category_id',
        'type',
        'active',
        'top',
        'system',
        'title',
        'created_at',
        'sort', 'perPage'
    ];

    protected $translationTable = 'page_translation';

    protected $defaults = [
        'sort' => '-created_at'
    ];

    public function __construct(Request $request)
    {
        $this->input = $this->prepareInput($request->all());
    }

    public function init()
    {
        $this->addSortable('id');
        $this->addSortable('page_category_id');
        $this->addSortable('type');
        $this->addSortable('active');
        $this->addSortable('top');
        $this->addSortable('system');
        $this->addSortable('created_at');
        $this->addSortable('title', $this->translationTable);

        $this->addJoin($this->translationTable, function () {
            $this->builder->leftJoin($this->translationTable, function ($join) {
                /**
                 * @var $join \Illuminate\Database\Query\JoinClause
                 */
                $join->on($this->table . '.id', $this->translationTable . '.service_id')->where('locale', \App::getLocale());
            })->select($this->table . '.*');
        });
    }

    public function id($value)
    {
        return $this->builder->where($this->column('id'), $value);
    }

    public function pageCategoryId($value)
    {
        return $this->builder->where($this->column('page_category_id'), $value);
    }

    public function type($value)
    {
        return $this->builder->where($this->column('type'), $value);
    }

    public function active($value)
    {
        return $this->builder->where($this->column('active'), $value);
    }

    public function top($value)
    {
        return $this->builder->where($this->column('top'), $value);
    }

    public function system($value)
    {
        return $this->builder->where($this->column('system'), $value);
    }

    public function title($value)
    {
        return $this->builder->whereHas('translations', function ($query) use ($value) {
            /**
             * @var $query \Illuminate\Database\Eloquent\Builder
             */
            $query->where('title', 'like', '%' . $value . '%')
                ->where('locale', \App::getLocale());
        });
    }
}
