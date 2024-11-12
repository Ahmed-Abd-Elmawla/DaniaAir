<?php

namespace App\Http\Controllers\Web\User\SafetyReports;

use Throwable;
use App\Models\SafetyItem;
use App\Models\SafetyReport;
use Illuminate\Http\Request;
use App\Traits\AlertPosition;
use App\Models\SafetyCategory;
use App\Helpers\sendNotification;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\User\SafetyReports\ReportRequest;


class SafetyReportController extends Controller
{
    use AlertPosition;

    public function index(Request $request)
    {
        $categories = SafetyCategory::with('items')->get();
        // return response()->json($categories);
        return view('web.report', compact('categories'));
    }

    public function store(ReportRequest $request)
    {
        $data = $request->safe()->except('reportItems');
        // dd($data);
        DB::beginTransaction();
        try {

            $report = SafetyReport::create($data);

            if (isset($request->reportItems) && count($request->reportItems)) {
                foreach ($request->reportItems as $reportItem) {
                    // $item_id = SafetyItem::where('uuid', $reportItem['item_id'])->first()->id;
                    $report->items()->attach($reportItem['item_id'], ['status' => $reportItem['status'], 'comment' => $reportItem['comment']]);
                }
            }

            DB::commit();
            sendNotification::newSafetyReportNotify();
            toast(__('web.report.successfully_created'), 'success')->timerProgressBar()->width('350px')->padding('10px')->position($this->position())->flash();
            return response()->json(['success' => true], 200);
        } catch (Throwable $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'error' => '__(\'dashboard.validation.went_wrong\'): ' . $e->getMessage()], 500);
        }
    }
}
