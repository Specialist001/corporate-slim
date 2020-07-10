<?php

namespace App\Http\Controllers\Admin;

use App\Domain\ProductCategories\Filters\ProductCategoryFilter;
use App\Domain\ProductCategories\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $filter = new ProductCategoryFilter($request);
        $productCategories = ProductCategory::withTranslation()->filter($filter)->paginateFilter();

        return view('admin.product-categories.index', [
            'productCategories' => $productCategories,
            'filters' => $filter->filters(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::with('children')->where('parent_id', 0)->get();
        $delimiter = '';

        return view('admin.product-categories.create', [
            'categories' => $categories,
            'delimiter' => $delimiter,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domain\ProductCategories\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domain\ProductCategories\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain\ProductCategories\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain\ProductCategories\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }
}
