<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;
use App\Models\SafetyReport;

class HomeController extends Controller
{
    public function index(){
        $reports = SafetyReport::count();
        return view('layouts.HomePage', compact('reports'));
    }
}
