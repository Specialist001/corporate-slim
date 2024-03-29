<?php


namespace App\Http\Controllers\Site;


use App\Domain\ServiceCategories\Models\ServiceCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $serviceCategories = ServiceCategory::withTranslation()->orderBy('order')->get();

        return view('site.home.index', [
            'serviceCategories' => $serviceCategories,
        ]);
    }
}
