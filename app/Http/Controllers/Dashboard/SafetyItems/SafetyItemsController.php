<?php

namespace App\Http\Controllers\Dashboard\SafetyItems;

use App\Traits\ShowToast;
use App\Models\SafetyItem;
use Illuminate\Http\Request;
use App\Models\SafetyCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SafetyItems\SafetyItemsRequest;
use App\Http\Resources\Dashboard\SafetyItems\SafetyItemsResource;
use App\Http\Requests\Dashboard\SafetyItems\SafetyItemsUpdateRequest;

class SafetyItemsController extends Controller
{
    use ShowToast;

    public function index(Request $request)
    {
        $items = SafetyItem::latest()->with(['category'])->paginate();
        $categories = SafetyCategory::all();
        $itemsData = SafetyItemsResource::collection($items);
        return view('pages.SafetyItems.safetyItems', compact('itemsData', 'categories'));
    }

    public function store(SafetyItemsRequest $request)
    {
        try {
            $validatedData = $request->validated();
            SafetyItem::create($validatedData);
            $this->showToast(__('dashboard.item.successfully_created'));
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => '__(\'dashboard.validation.went_wrong\'): ' . $e->getMessage()], 500);
        }
    }

    public function update(SafetyItemsUpdateRequest $request, SafetyItem $safetyItem)
    { {
            try {
                $validatedData = $request->validated();

                $safetyItem->update($validatedData);

                $this->showToast(__('dashboard.item.successfully_updated'));

                return response()->json(['success' => true], 200);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'error' => '__(\'dashboard.validation.went_wrong\'): ' . $e->getMessage()], 500);
            }
        }
    }

    public function destroy(SafetyItem $safetyItem)
    {
        $safetyItem->delete();
        $this->showToast(__('dashboard.item.successfully_deleted'));
        return redirect()->back();
    }
}
