<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\SafetyCategory;
use App\Models\SafetyItem;
use App\Models\SafetyReport;

class HomeController extends Controller
{
    public function index(){
        $admins = Admin::active()->count();
        $categories = SafetyCategory::count();
        $items = SafetyItem::count();
        $reports = SafetyReport::count();
        return view('layouts.HomePage', compact('admins', 'categories', 'items', 'reports'));
    }
}
