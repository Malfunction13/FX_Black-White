<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Category::create(['name' => $request->name]);

        return redirect()->route('profile');
    }
}
