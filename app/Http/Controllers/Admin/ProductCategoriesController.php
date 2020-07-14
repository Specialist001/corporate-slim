<?php

namespace App\Http\Controllers\Admin;

use App\Domain\ProductCategories\Filters\ProductCategoryFilter;
use App\Domain\ProductCategories\Jobs\DeleteProductCategoryJob;
use App\Domain\ProductCategories\Jobs\StoreProductCategoryJob;
use App\Domain\ProductCategories\Jobs\UpdateProductCategoryJob;
use App\Domain\ProductCategories\Models\ProductCategory;
use App\Domain\ProductCategories\Requests\ProductCategoryRequest;
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
    public function store(ProductCategoryRequest $request)
    {
        try {
            $this->dispatchNow(new StoreProductCategoryJob($request));
            return redirect()->route('admin.product-categories.index')->with('success', trans('admin.flash.created'));
        } catch(\Exception $exception) {
            return redirect()->route('admin.product-categories.index')->with('error', trans('admin.flash.not_created'));
        }
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
        $category = [];
        $categories = ProductCategory::with('children')->where('parent_id',0)->get();
        $delimiter = '';

        return view('admin.product-categories.edit', [
            // 'category' => $category,
            'productCategory' => $productCategory,
            'categories' => $categories,
            'delimiter' => $delimiter,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain\ProductCategories\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
        try {
            $this->dispatchNow(new UpdateProductCategoryJob($request, $productCategory));
            return redirect()->route('admin.product-categories.index')->with('success', trans('admin.flash.edited'));
        } catch(\Exception $exception) {
            return redirect()->route('admin.product-categories.index')->with('error', trans('admin.flash.not_edited'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain\ProductCategories\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        try {
            $this->dispatchNow(new DeleteProductCategoryJob($productCategory));
            return redirect()->route('admin.product-categories.index')->with('success', trans('admin.flash.destroyed'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.product-categories.index')->with('danger', trans('admin.flash.not_destroyed'));
        }
    }

    /**
     * @param ProductCategory $productCategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteImage(ProductCategory $productCategory)
    {
        try {
            $productCategory->deleteImage();
            $productCategory->save();
            return response()->json(['result' => 'success'], 200);
        } catch (\Exception $exception) {
            return response()->json(['result' => 'error'], 200);
        }
    }

    /**
     * @param ProductCategory $productCategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteIcon(ProductCategory $productCategory)
    {
        try {
            $productCategory->deleteIcon();
            $productCategory->save();
            return response()->json(['result' => 'success'], 200);
        } catch (\Exception $exception) {
            return response()->json(['result' => 'error'], 200);
        }
    }
}
