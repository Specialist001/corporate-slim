<?php


namespace App\Domain\ServiceCategories\Filters;


use App\Services\FilterService\Filter;
use Illuminate\Http\Request;

class ServiceCategoryFilter extends Filter
{
    protected $available = [
        'id',
        'type',
        'title',
        'active',
        'created_at',
        'sort', 'perPage'
    ];

    protected $translationTable = 'service_category_translations';

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
        $this->addSortable('title', $this->translationTable);
        $this->addSortable('active');
        $this->addSortable('created_at');

        $this->addJoin($this->translationTable, function () {
            $this->builder->leftJoin($this->translationTable, function ($join) {
                /**
                 * @var $join \Illuminate\Database\Query\JoinClause
                 */
                $join->on($this->table . '.id', $this->translationTable . '.service_category_id')->where('locale', \App::getLocale());
            })->select($this->table . '.*');
        });
    }

    public function id($value)
    {
        return $this->builder->where($this->column('id'), $value);
    }

    public function type($value)
    {
        return $this->builder->where($this->column('type'), $value);
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
