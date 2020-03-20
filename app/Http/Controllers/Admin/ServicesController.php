<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Services\Filters\ServiceFilter;
use App\Domain\Services\Jobs\StoreServiceJob;
use App\Domain\Services\Jobs\UpdateServiceJob;
use App\Domain\Services\Models\Service;
use App\Domain\ServiceCategories\Models\ServiceCategory;
use App\Domain\Services\Requests\ServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        $filter = new ServiceFilter($request);
        $services = Service::withTranslation()->filter($filter)->paginateFilter();

        return view('admin.services.index', [
            'services' => $services,
        ]);
    }

    public function create()
    {
        $categories = ServiceCategory::where('parent_id',0)->with('children')->get();
        $delimiter = '';

        return view('admin.services.create', [
            'categories' => $categories,
            'delimiter' => $delimiter,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Domain\Services\Requests\ServiceRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ServiceRequest $request)
    {
        try {
            $this->dispatchNow(new StoreServiceJob($request));
            return redirect()->route('admin.services.index')->with('success', trans('admin.flash.created'));
        } catch(\Exception $exception) {
            return redirect()->route('admin.services.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domain\Services\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domain\Services\Models\Service  $service
     * @return View
     */
    public function edit(Service $service)
    {
        $categories = ServiceCategory::where('parent_id', 0)->with('children')->get();
        $delimiter = '';

        return view('admin.services.edit', [
            'service' => $service,
            'categories' => $categories,
            'delimiter' => $delimiter,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Domain\Services\Requests\ServiceRequest  $request
     * @param  \App\Domain\Services\Models\Service  $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ServiceRequest $request, Service $service)
    {
        try {
            $this->dispatchNow(new UpdateServiceJob($request, $service));
            return redirect()->route('admin.services.index')->with('success', trans('admin.flash.created'));
        } catch(\Exception $exception) {
            return redirect()->route('admin.services.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain\Services\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        try {
            $this->dispatchNow(new DeleteServiceJob($service));
            return redirect()->route('admin.services.index')->with('success', trans('admin.flash.destroyed'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.services.index')->with('danger', trans('admin.flash.not_destroyed'));
        }
    }

    public function deleteImage(Service $service)
    {
        try {
            $service->deleteImage();
            $service->save();
            return response()->json(['result' => 'success'], 200);
        } catch (\Exception $exception) {
            return response()->json(['result' => 'error'], 200);
        }
    }

    public function deleteIcon(Service $service)
    {
        try {
            $service->deleteIcon();
            $service->save();
            return response()->json(['result' => 'success'], 200);
        } catch (\Exception $exception) {
            return response()->json(['result' => 'error'], 200);
        }
    }
}
