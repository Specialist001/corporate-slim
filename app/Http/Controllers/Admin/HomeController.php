<?php
/**
 * Created by PhpStorm.
 * User: irock
 * Date: 05.04.2019
 * Time: 14:23
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.welcome');
        //кол-во броней
        //кол-во поль-лей
        //кол-во авто
        //кол-во компаний
    }
}
