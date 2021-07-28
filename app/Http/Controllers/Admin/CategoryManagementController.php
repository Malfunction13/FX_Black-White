<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Throwable;

class CategoryManagementController extends Controller
{

    public function categoryOverview(Request $request) {

        return view('admin.category_overview', ['categories'=> Category::all()]);
    }

    public function categoryCreate(StoreCategoryRequest $request) {
        try {
            Category::create(['name' => $request->name]);

            return response()->json([
                'data' => Category::all(),
                'status' => 'success',
                'message' => 'Category created!',
            ]);
        } catch (Throwable $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Unexpected error, try again later or contact administration.',
            ], 500);
        }
    }

    public function categoryUpdate(StoreCategoryRequest $request, Category $category) {
        try {
            $category->name = ($request->new_name);
            $category->save();

            return response()->json([
                'data' => Category::all(),
                'status' => 'success',
                'message' => 'Category updated!',
            ]);
        } catch (Throwable $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Unexpected error, try again later or contact administration.',
            ], 500);
        }
    }

    public function categoryDelete(StoreCategoryRequest $request, Category $category) {
        try {
            $category->delete();

            return response()->json([
                'data' => Category::all(),
                'status' => 'success',
                'message' => 'Category deleted!',
            ]);
        } catch (Throwable $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Unexpected error, try again later or contact administration.',
            ], 500);
        }
    }
}
