<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Brands\Filters\BrandFilter;
use App\Domain\Brands\Jobs\BrandJob;
use App\Domain\Brands\Jobs\DeleteBrandJob;
use App\Domain\Brands\Models\Brand;
use App\Domain\Brands\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $filter = new BrandFilter($request);
        $brands = Brand::filter($filter)->paginateFilter();

        return view('admin.brands.index', [
            'brands' => $brands,
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
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        try {
            $this->dispatchNow(new BrandJob($request));
            return redirect()->route('admin.brands.index')->with('success', trans('admin.flash.created'));
        } catch(\Exception $exception) {
            return redirect()->route('admin.brands.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domain\Brands\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domain\Brands\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', [
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain\Brands\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        try {
            $this->dispatchNow(new BrandJob($request, $brand));
            return redirect()->route('admin.brands.index')->with('success', trans('admin.flash.created'));
        } catch(\Exception $exception) {
            return redirect()->route('admin.brands.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain\Brands\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        try {
            $this->dispatchNow(new DeleteBrandJob($brand));
            return redirect()->route('admin.brands.index')->with('success', trans('admin.flash.destroyed'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.brands.index')->with('danger', trans('admin.flash.not_destroyed'));
        }
    }

    /**
     * @param Brand $brand
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteLogo(Brand $brand)
    {
        try {
            $brand->deleteLogo();
            $brand->save();
            return response()->json(['result' => 'success'], 200);
        } catch (\Exception $exception) {
            return response()->json(['result' => 'error'], 200);
        }
    }
}
