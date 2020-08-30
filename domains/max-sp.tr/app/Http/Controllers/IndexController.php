<?php

namespace App\Http\Controllers;

use App\Projects;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function show()
    {
        $projects = Projects::adminProjects()->get();
        return view('frontend.pages.projects', compact('projects'));
    }
}
