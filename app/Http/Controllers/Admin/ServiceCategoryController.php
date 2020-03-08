<?php


namespace App\Http\Controllers\Admin;


use App\Domain\ServiceCategories\Filters\ServiceCategoryFilter;
use App\Domain\ServiceCategories\Models\ServiceCategory;
use App\Domain\ServiceCategories\Requests\ServiceCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function index(Request $request)
    {
        $filter = new ServiceCategoryFilter($request);
        $serviceCategories = ServiceCategory::withTranslation()->filter($filter)->paginateFilter();

        return view('admin.service-category.index', [
            'serviceCategories' => $serviceCategories,
        ]);
    }

    public function create(ServiceCategoryRequest $request)
    {
        return 1;
    }

}
