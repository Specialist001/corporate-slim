<?php

namespace App\Domain\Options\Filters;

use App;
use App\Services\FilterService\Filter;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;

class OptionFilter extends Filter
{
    protected $available = [
        'id',
        'option_group_id',
        'type',
        'name',
        'created_at',
        'sort', 'perPage'
    ];

    protected $translationTable = 'option_translations';

    protected $defaults = [
        'sort' => '-id'
    ];

    public function __construct(Request $request)
    {
        $this->input = $this->prepareInput($request->all());
    }

    public function init()
    {
        $this->addSortable('id');
        $this->addSortable('name', $this->translationTable);
        $this->addSortable('option_group_id');
        $this->addSortable('type');
        $this->addSortable('created_at');

        $this->addJoin($this->translationTable, function () {
            $this->builder->leftJoin($this->translationTable, function ($join) {
                /**
                 * @var $join JoinClause
                 */
                $join->on($this->table . '.id', $this->translationTable . '.option_id')->where('locale', App::getLocale());
            })->select($this->table . '*');
        });
    }

    public function id($value)
    {
        return $this->builder->where($this->column('id'), $value);
    }

    public function option_group_id($value)
    {
        return $this->builder->where($this->column('option_group_id'), $value);
    }

    public function type($value)
    {
        return $this->builder->where($this->column('type'), $value);
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

    public function created_at($value)
    {
        return $this->builder->where($this->column('created_at'), $value);
    }
}
