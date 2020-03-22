<?php


namespace App\Http\Controllers\Admin;


use App\Domain\PageCategories\Filters\PageCategoryFilter;
use App\Domain\PageCategories\Jobs\DeletePageCategoryJob;
use App\Domain\PageCategories\Jobs\StorePageCategoryJob;
use App\Domain\PageCategories\Jobs\UpdatePageCategoryJob;
use App\Domain\PageCategories\Models\PageCategory;
use App\Domain\PageCategories\Requests\PageCategoryRequest;
use App\Http\Controllers\Controller;
use App\Services\FilterService\Filter;
use Illuminate\Http\Request;

class PageCategoriesController extends Controller
{
    public function index(Request $request)
    {
        $filter = new PageCategoryFilter($request);
        $pageCategories  = PageCategory::withTranslation()->filter($filter)->paginateFilter();

        return view('admin.page-categories.index', [
            'pageCategories' => $pageCategories,
            'filters' => $filter->filters(),
        ]);
    }

    public function create()
    {
        return view('admin.page-categories.create');
    }

    public function store(PageCategoryRequest $request)
    {
        try {
            $this->dispatchNow(new StorePageCategoryJob($request));
            return redirect()->route('admin.page-categories.index')->with('success', trans('admin.flash.created'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.page-categories.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    public function edit(PageCategory $pageCategory)
    {
        return view('admin.page-categories.edit',[
            'pageCategory' => $pageCategory
        ]);
    }

    public function update(PageCategoryRequest $request, PageCategory $pageCategory)
    {
        try {
            $this->dispatchNow(new UpdatePageCategoryJob($request, $pageCategory));
            return redirect()->route('admin.page-categories.index')->with('success', trans('admin.flash.created'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.page-categories.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    public function destroy(PageCategory $pageCategory)
    {
        try {
            $this->dispatchNow(new DeletePageCategoryJob($pageCategory));
            return redirect()->route('admin.page-categories.index')->with('success', trans('admin.flash.created'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.page-categories.index')->with('error', trans('admin.flash.not_created'));
        }
    }
}
