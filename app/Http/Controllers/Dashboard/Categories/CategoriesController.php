<?php

namespace App\Http\Controllers\Dashboard\Categories;

use App\Traits\ShowToast;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SafetyCategories\SafetyCategoryRequest;
use App\Http\Resources\Dashboard\SafetyCategories\SafetyCategoryResource;
use App\Models\SafetyCategory;

class CategoriesController extends Controller
{
    use ShowToast;

    public function index(Request $request)
    {
        $categories = SafetyCategory::latest()->paginate();
        $categoriesData = SafetyCategoryResource::collection($categories);
        // dd($categoriesData);
        return view('pages.Categories.categories', compact('categoriesData'));
    }

    public function store(SafetyCategoryRequest $request)
    {
        try {
        $validatedData = $request->validated();
        SafetyCategory::create($validatedData );
        $this->showToast(__('dashboard.category.successfully_created'));
        return response()->json(['success' => true], 200);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => '__(\'dashboard.validation.went_wrong\'): ' . $e->getMessage()], 500);
    }
    }

    public function update(SafetyCategoryRequest $request, SafetyCategory $category)
    {
        {
            try {
                $validatedData = $request->validated();

                $category->update($validatedData);

                $this->showToast(__('dashboard.category.successfully_updated'));

                return response()->json(['success' => true], 200);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'error' => '__(\'dashboard.validation.went_wrong\'): ' . $e->getMessage()], 500);
            }
        }
    }

    public function destroy(SafetyCategory $category)
    {
        $category->delete();
        $this->showToast(__('dashboard.category.successfully_deleted'));
        return redirect()->back();
    }
}

