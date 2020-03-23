<?php


namespace App\Http\Controllers\Admin;


use App\Domain\ServiceCategories\Filters\ServiceCategoryFilter;
use App\Domain\ServiceCategories\Jobs\DeleteServiceCategoryJob;
use App\Domain\ServiceCategories\Jobs\StoreServiceCategoryJob;
use App\Domain\ServiceCategories\Jobs\UpdateServiceCategoryJob;
use App\Domain\ServiceCategories\Models\ServiceCategory;
use App\Domain\ServiceCategories\Requests\ServiceCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceCategoriesController extends Controller
{
    public function index(Request $request)
    {
        $filter = new ServiceCategoryFilter($request);
        $serviceCategories = ServiceCategory::withTranslation()->filter($filter)->paginateFilter();

        return view('admin.service-categories.index', [
            'serviceCategories' => $serviceCategories,
            'filters' => $filter->filters(),
        ]);
    }

    public function create()
    {
        $categories = ServiceCategory::with('children')->where('parent_id',0)->get();
        $delimiter = '';

        return view('admin.service-categories.create', [
            'categories' => $categories,
            'delimiter' => $delimiter,
        ]);
    }

    public function store(ServiceCategoryRequest $request)
    {
        try {
            $this->dispatchNow(new StoreServiceCategoryJob($request));
            return redirect()->route('admin.service-categories.index')->with('success', trans('admin.flash.created'));
        } catch(\Exception $exception) {
            return redirect()->route('admin.service-categories.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    public function edit(ServiceCategory $serviceCategory)
    {

        $category = [];
        $categories = ServiceCategory::with('children')->where('parent_id',0)->get();
        $delimiter = '';

        return view('admin.service-categories.edit', [
            // 'category' => $category,
            'serviceCategory' => $serviceCategory,
            'categories' => $categories,
            'delimiter' => $delimiter,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain\ServiceCategories\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ServiceCategoryRequest $request, ServiceCategory $serviceCategory)
    {
        try {
            $this->dispatchNow(new UpdateServiceCategoryJob($request, $serviceCategory));
            return redirect()->route('admin.service-categories.index')->with('success', trans('admin.flash.edited'));
        } catch(\Exception $exception) {
            return redirect()->route('admin.service-categories.index')->with('error', trans('admin.flash.not_edited'));
        }
    }

    public function destroy(ServiceCategory $serviceCategory)
    {
        try {
            $this->dispatchNow(new DeleteServiceCategoryJob($serviceCategory));
            return redirect()->route('admin.service-categories.index')->with('success', trans('admin.flash.destroyed'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.service-categories.index')->with('danger', trans('admin.flash.not_destroyed'));
        }
    }

    public function deleteImage(ServiceCategory $serviceCategory)
    {
        try {
            $serviceCategory->deleteImage();
            $serviceCategory->save();
            return response()->json(['result' => 'success'], 200);
        } catch (\Exception $exception) {
            return response()->json(['result' => 'error'], 200);
        }
    }

    public function deleteIcon(ServiceCategory $serviceCategory)
    {
        try {
            $serviceCategory->deleteIcon();
            $serviceCategory->save();
            return response()->json(['result' => 'success'], 200);
        } catch (\Exception $exception) {
            return response()->json(['result' => 'error'], 200);
        }
    }

}
