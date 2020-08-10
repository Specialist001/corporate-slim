<?php


namespace App\Domain\Brands\Filters;


use App\Services\FilterService\Filter;
use Illuminate\Http\Request;

class BrandFilter extends Filter
{
    protected $available = [
        'id',
        'name',
        'active',
        'on_main',
        'order',
        'sort', 'perPage'
    ];

    protected $defaults = [
        'sort' => '-id'
    ];

    public function __construct(Request $request)
    {
        $this->input = $this->prepareInput($request->all());
    }

    protected function init()
    {
        $this->addSortable('id');
        $this->addSortable('name');
        $this->addSortable('active');
        $this->addSortable('on_main');
        $this->addSortable('order');
        $this->addSortable('created_at');
    }

    public function id($value)
    {
        return $this->builder->where($this->column('id'), $value);
    }

    public function name($value)
    {
        return $this->builder->where($this->column('name'), $value);
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
}
