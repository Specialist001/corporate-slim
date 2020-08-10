<?php


namespace App\Domain\ProductCategories\Filters;


use App\Services\FilterService\Filter;
use Illuminate\Http\Request;
use function foo\func;

class ProductCategoryFilter extends Filter
{
    protected $available = [
        'id',
        'parent_id',
        'active',
        'on_main',
        'order',
        'created_at',
        'sort', 'perPage'
    ];

    protected $translationTable = 'product_category_translations';

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
        $this->addSortable('parent_id');
        $this->addSortable('order');
        $this->addSortable('title', $this->translationTable);
        $this->addSortable('created_at');

        $this->addJoin($this->translationTable, function () {
            $this->builder->leftJoin($this->translationTable, function ($join) {
                /**
                 * @var $join \Illuminate\Database\Query\JoinClause
                 */
                $join->on($this->table . '.id', $this->translationTable . '.product_category_id')
                    ->where('locale', \App::getLocale());
            })->select($this->table . '*');
        });
    }

    public function id($value)
    {
        return $this->builder->where($this->column('id'), $value);
    }

    public function parent_id($value)
    {
        return $this->builder->where($this->column('parent_id'), $value);
    }

    public function active($value)
    {
        return $this->builder->where($this->column('active'), $value);
    }

    public function on_main($value)
    {
        return $this->builder->where($this->column('on_main'), $value);
    }

    public function order($value)
    {
        return $this->builder->where($this->column('order'), $value);
    }

    public function created_at($value)
    {
        return $this->builder->where($this->column('created_at'), $value);
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
