<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{


    public function store(CategoryRequest $request)
    {

        $category = $request->category;
        $category = Category::create([
            'category' => $category,
        ]);

        if ($category) {
            return response()->json([
                'success' => true,
                'message' => 'Category created successfully'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Category was not created!'
        ]);
    }

    public function index()
    {
        return new CategoryResource(Category::all());
    }
}
