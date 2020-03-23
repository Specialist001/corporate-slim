<?php


namespace App\Http\Controllers\Site;


use App\Domain\ServiceCategories\Models\ServiceCategory;
use App\Http\Controllers\Controller;

class ServiceCategoriesController extends Controller
{
    public function index()
    {

    }

    public function show($slug)
    {
        $serviceCategory = ServiceCategory::whereSlug($slug)->first();

        return view('site.services.show', [
            'serviceCategory' => $serviceCategory
        ]);
    }

}
