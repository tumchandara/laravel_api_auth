<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
        // CategoryController.php
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        
        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    public function update(Request $request, Category $category)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the category
        $category->update([
            'name' => $request->input('name'),
            // Add other fields to update if necessary
        ]);

        return response()->json($category, 200); // Return a response, indicating success
    }


    public function destroy(Category $category)
    {
        // Delete the category
        $category->delete();

        return response()->json(null, 204); // Return a response with a "No Content" status
    }


    // Implement other CRUD methods as needed

}
