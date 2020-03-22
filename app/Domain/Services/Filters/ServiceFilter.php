<?php


namespace App\Domain\Services\Filters;


use App\Services\FilterService\Filter;
use Illuminate\Http\Request;

class ServiceFilter extends Filter
{
    protected $available = [
        'id',
        'service_category_id',
        'active',
        'title',
        'created_at',
        'sort', 'perPage'
    ];

    protected $translationTable = 'service_translations';

    protected $defaults = [
        'sort' => '-created_at'
    ];

    public function __construct(Request $request)
    {
        $this->input = $this->prepareInput($request->all());
    }

    protected function init()
    {
        $this->addSortable('id');
        $this->addSortable('service_category_id');
        $this->addSortable('active');
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

    public function serviceCategoryId($value)
    {
        return $this->builder->where($this->column('service_category_id'), $value);
    }

    public function active($value)
    {
        return $this->builder->where($this->column('active'), $value);
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
