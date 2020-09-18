<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Brands\Models\Brand;
use App\Domain\Options\Models\Option;
use App\Domain\ProductCategories\Models\ProductCategory;
use App\Domain\Products\Filters\ProductFilter;
use App\Domain\Products\Jobs\StoreProductJob;
use App\Domain\Products\Jobs\UpdateProductJob;
use App\Domain\Products\Models\Product;
use App\Domain\Products\Requests\ProductRequest;
use App\Domain\Units\Models\Unit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $filter = new ProductFilter($request);
        $products = Product::withTranslation()->filter($filter)->paginateFilter();

        return view('admin.products.index', [
            'filters' => $filter->filters(),
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $productCategories = ProductCategory::with('children')->where('parent_id', 0)->get();
        $productCategories = ProductCategory::get();
        $brands = Brand::actives()->get();
        $units = Unit::actives()->get();

        return view('admin.products.create', [
            'productCategories' => $productCategories,
            'brands' => $brands,
            'units' => $units,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return void
     */
    public function store(ProductRequest $request)
    {
        try {
            $this->dispatchNow(new StoreProductJob($request));
            return redirect()->route('admin.products.index')->with('success', trans('admin.flash.created'));
        } catch(\Exception $exception) {
            return redirect()->route('admin.products.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domain\Products\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domain\Products\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $productCategories = ProductCategory::get();
        $brands = Brand::actives()->get();
        $units = Unit::actives()->get();
        $productCategoryOptions = $product->category->optionGroups()->first()->options;

//        foreach ($product->category->optionGroups()->first()->options as $opt) {
//            dd($opt->optionValues);
//            echo $opt->name .': <br>';
//            foreach ($opt->optionValues as $optionValue) {
//                echo ($optionValue->name)."<br>";
//            }
//        }
//        exit;

        return view('admin.products.edit', [
            'productCategories' => $productCategories,
            'brands' => $brands,
            'units' => $units,
            'product' => $product,
            'productCategoryOptions' => $productCategoryOptions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param \App\Domain\Products\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        try {
            $this->dispatchNow(new UpdateProductJob($request, $product));
            return redirect()->route('admin.products.edit', $product)->with('success', trans('admin.flash.edited'));
        } catch(\Exception $exception) {
            return redirect()->route('admin.products.edit', $product)->with('error', trans('admin.flash.not_edited'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain\Products\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
