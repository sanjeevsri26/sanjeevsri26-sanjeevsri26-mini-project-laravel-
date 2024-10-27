<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import the Log facade

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Retrieve categories with parent relationship
        $categories = Category::with('parent')->get();
        
        // Log the count of retrieved categories
        Log::info('Retrieved all categories', ['count' => $categories->count()]);
        
        // Pass categories to the view
        return view('Admin.category.index', compact('categories'));
    }
    

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        Log::info('Showing create category form');
        return view('Admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'categoryName' => 'nullable|string|max:255', // Allow categoryName to be null
            'parent_id' => 'nullable|exists:categories,id', // Ensure foreign key relationship
        ]);

        try {
            // Create new category
            $category = Category::create([
                'categoryName' => $request->categoryName,
                'parent_id' => $request->parent_id,
            ]);

            // Log the creation of the new category
            Log::info('Category created', ['id' => $category->id, 'name' => $category->categoryName]);

            // Check if categoryName is null, and assign it as a parent category if so
            if (is_null($category->categoryName)) {
                $category->update(['parent_id' => null]); // Explicitly set it to be a parent
            }

            // Redirect with success message
            return redirect()->route('category.index')->with('success', 'Category created successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to create category', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to create category. Please try again.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parentCategories = Category::whereNull('parent_id')->get(); // Fetch top-level categories
        Log::info('Showing edit form for category', ['id' => $id, 'name' => $category->categoryName]);
        return view('Admin.category.edit', compact('category', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'categoryName' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id', // Ensure it exists in the 'categories' table
        ]);

        try {
            // Find the category and update it
            $category = Category::findOrFail($id);
            $category->update([
                'categoryName' => $request->categoryName,
                'parent_id' => $request->parent_id ?: null, // Ensure it sets as null if no parent is selected
            ]);

            Log::info('Category updated', ['id' => $id, 'name' => $category->categoryName]);

            return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to update category', ['id' => $id, 'error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to update category. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            Log::info('Category deleted', ['id' => $id, 'name' => $category->categoryName]);

            return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to delete category', ['id' => $id, 'error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to delete category. Please try again.');
        }
    }
}
