<?php


namespace App\Http\Controllers\Shop;


use App\Domain\ServiceCategories\Models\ServiceCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
//        $serviceCategories = ServiceCategory::withTranslation()->orderBy('order')->get();
//
        return view('shop.home.index', [
//            'serviceCategories' => $serviceCategories,
        ]);
//        dd(2);
    }
}
