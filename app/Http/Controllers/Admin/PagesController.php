<?php


namespace App\Http\Controllers\Admin;


use App\Domain\PageCategories\Models\PageCategory;
use App\Domain\Pages\Filters\PageFilter;
use App\Domain\Pages\Jobs\DeletePageJob;
use App\Domain\Pages\Jobs\StorePageJob;
use App\Domain\Pages\Jobs\UpdatePageJob;
use App\Domain\Pages\Models\Page;
use App\Domain\Pages\Requests\PageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $filter = new PageFilter($request);
        $pages = Page::withTranslation()->filter($filter)->paginateFilter();

        return view('admin.pages.index', [
            'pages' => $pages,
            'filters' => $filter->filters(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $pageCategories = PageCategory::withTranslation()->where('active', 1)->get();
        return view('admin.pages.create', [
            'pageCategories' => $pageCategories
        ]);
    }

    public function store(PageRequest $request)
    {
        try {
            $this->dispatchNow(new StorePageJob($request));
            return redirect()->route('admin.pages.index')->with('success', trans('admin.flash.created'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.pages.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    public function edit(Page $page)
    {
        $pageCategories = PageCategory::withTranslation()->where('active', 1)->get();

        return view('admin.pages.edit', [
            'page' => $page,
            'pageCategories' => $pageCategories
        ]);
    }

    public function update(PageRequest $request, Page $page)
    {
        try {
            $this->dispatchNow(new UpdatePageJob($request, $page));
            return redirect()->route('admin.pages.index')->with('success', trans('admin.flash.created'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.pages.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    public function destroy(Page $page)
    {
        try {
            $this->dispatchNow(new DeletePageJob($page));
            return redirect()->route('admin.pages.index')->with('success', trans('admin.flash.created'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.pages.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    public function deleteImage(Page $page)
    {
        try {
            $page->deleteImage();
            $page->save();
            return redirect()->route('admin.pages.index')->with('success', trans('admin.flash.created'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.pages.index')->with('error', trans('admin.flash.not_created'));
        }
    }
}
