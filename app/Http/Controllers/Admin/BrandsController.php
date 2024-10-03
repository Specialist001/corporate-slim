<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Brands\Filters\BrandFilter;
use App\Domain\Brands\Jobs\BrandJob;
use App\Domain\Brands\Jobs\DeleteBrandJob;
use App\Domain\Brands\Makes\BrandMake;
use App\Domain\Brands\Models\Brand;
use App\Domain\Brands\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View|Application
     */
    public function index(Request $request)
    {
        $filter = new BrandFilter($request);
        $brands = Brand::filter($filter)->paginateFilter();

        return view('admin.brands.index', [
            'brands'  => $brands,
            'filters' => $filter->filters(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BrandRequest $request
     * @return RedirectResponse|Response
     * @throws Exception
     */
    public function store(BrandRequest $request): Response | RedirectResponse
    {
        try {
            $brandMake = new BrandMake(brandRequest: $request);
            BrandJob::dispatch($brandMake);
            return redirect()->route(route: 'admin.brands.index')->with(key: 'success', value: trans('admin.flash.created'));
        } catch (Exception $exception) {
            return redirect()->route(route: 'admin.brands.index')->with(key: 'error', value: trans('admin.flash.not_created') . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Brand $brand
     * @return Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Brand $brand
     * @return Factory|View|Application|Response
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
     * @param Request $request
     * @param Brand $brand
     * @return RedirectResponse
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        try {
            $brandMake = new BrandMake(brandRequest: $request);
            BrandJob::dispatch($brandMake, $brand);
            return redirect()->route('admin.brands.index')->with('success', trans('admin.flash.created'));
        } catch (Exception $exception) {
            return redirect()->route('admin.brands.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Brand $brand
     * @return RedirectResponse
     */
    public function destroy(Brand $brand): RedirectResponse
    {
        try {
            DeleteBrandJob::dispatch($brand);
            return redirect()->route('admin.brands.index')->with('success', trans('admin.flash.destroyed'));
        } catch (Exception $exception) {
            return redirect()->route('admin.brands.index')->with('danger', trans('admin.flash.not_destroyed'));
        }
    }

    /**
     * @param Brand $brand
     * @return JsonResponse
     */
    public function deleteLogo(Brand $brand): JsonResponse
    {
        try {
            $brand->deleteLogo();
            $brand->save();
            return response()->json(['result' => 'success'], 200);
        } catch (Exception $exception) {
            return response()->json(['result' => 'error'], 200);
        }
    }
}
