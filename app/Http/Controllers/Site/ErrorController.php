<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ErrorController extends Controller
{
    public function notFound()
    {
        return view('site.errors.404');
    }
}
