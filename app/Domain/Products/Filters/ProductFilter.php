<?php


namespace App\Domain\Products\Filters;


use App\Services\FilterService\Filter;
use Illuminate\Http\Request;

class ProductFilter extends Filter
{
    protected $available = [
        'id',
        'title',
        'product_category_id',
        'brand_id',
        'active',
        'on_main',
        'amount',
        'price',
        'sku',
        'manufacturer',
        'created_at',
        'sort', 'perPage'
    ];

    protected $translationTable = 'product_translations';

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
        $this->addSortable('product_category_id');
        $this->addSortable('brand_id');
        $this->addSortable('active');
        $this->addSortable('on_main');
        $this->addSortable('amount');
        $this->addSortable('price');
        $this->addSortable('sku');
        $this->addSortable('manufacturer');
        $this->addSortable('title', $this->translationTable);

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

    public function product_category_id($value)
    {
        return $this->builder->where($this->column('product_category_id'), $value);
    }

    public function brand_id($value)
    {
        return $this->builder->where($this->column('brand_id'), $value);
    }

    public function active($value)
    {
        return $this->builder->where($this->column('active'), $value);
    }

    public function on_main($value)
    {
        return $this->builder->where($this->column('on_main'), $value);
    }

    public function amount($value)
    {
        return $this->builder->where($this->column('amount'), $value);
    }

    public function price($value)
    {
        return $this->builder->where($this->column('price'), $value);
    }

    public function sku($value)
    {
        return $this->builder->where($this->column('sku'), $value);
    }

    public function manufacturer($value)
    {
        return $this->builder->where($this->column('manufacturer'), $value);
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
