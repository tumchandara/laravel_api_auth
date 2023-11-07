<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubcategoryController extends Controller
{
    // SubcategoryController.php
    public function index()
    {
        $subcategories = Subcategory::all();
        return response()->json($subcategories);
    }

    public function store(Request $request)
    {
        $subcategory = Subcategory::create($request->all());
        return response()->json($subcategory, 201);
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the subcategory
        $subcategory->update([
            'name' => $request->input('name'),
            // Add other fields to update if necessary
        ]);

        return response()->json($subcategory, 200); // Return a response, indicating success
    }

    public function destroy(Subcategory $subcategory)
    {
        // Delete the subcategory
        $subcategory->delete();

        return response()->json(null, 204); // Return a response with a "No Content" status
    }



// Implement other CRUD methods as needed

}
