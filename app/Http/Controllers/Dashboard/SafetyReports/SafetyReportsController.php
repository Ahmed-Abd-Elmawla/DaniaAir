<?php

namespace App\Http\Controllers\Dashboard\SafetyReports;

use App\Models\SafetyReport;
use App\Traits\ShowToast;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\SafetyReports\SafetyReportsResource;

class SafetyReportsController extends Controller
{
    use ShowToast;

    public function index(Request $request)
    {
        $reports = SafetyReport::latest()->paginate();
        $reportsData = SafetyReportsResource::collection($reports);
        return view('pages.SafetyReports.reports', compact('reportsData'));
    }

    public function destroy(SafetyReport $report)
    {
        $report->delete();
        $this->showToast(__('dashboard.report.successfully_deleted'));
        return redirect()->back();
    }
}

