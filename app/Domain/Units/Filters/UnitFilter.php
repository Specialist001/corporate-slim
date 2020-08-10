<?php


namespace App\Domain\Units\Filters;


use App\Services\FilterService\Filter;
use Illuminate\Http\Request;

class UnitFilter extends Filter
{
    protected $available = [
        'id',
        'active',
        'name',
        'sort', 'perPage'
    ];

    protected $translationTable = 'unit_translations';

    protected $defaults = [
        'sort' => 'id'
    ];

    public function __construct(Request $request)
    {
        $this->input = $this->prepareInput($request->all());
    }

    protected function init()
    {
        $this->addSortable('id');
        $this->addSortable('name', $this->translationTable);

        $this->addJoin($this->translationTable, function () {
            $this->builder->leftJoin($this->translationTable, function ($join) {
                /**
                 * @var $join \Illuminate\Database\Query\JoinClause
                 */
                $join->on($this->table . '.id', $this->translationTable . '.unit_id')->where('locale', \App::getLocale());
            })->select($this->table . '.*');
        });
    }

    public function id($value)
    {
        return $this->builder->where($this->column('id'), $value);
    }

    public function name($value)
    {
        return $this->builder->whereHas('translations', function ($query) use ($value) {
            /**
             * @var $query \Illuminate\Database\Eloquent\Builder
             */
            $query->where('name', 'like', '%' . $value . '%')
                ->where('locale', \App::getLocale());
        });
    }
}
