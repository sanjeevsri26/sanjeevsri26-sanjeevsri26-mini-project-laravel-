<?php

namespace App\Http\Controllers\Admin;


use App\Models\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Products::all();
        
        return view('Admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'ProductsTitle' => 'required',
        'ProductsContent' => 'required',
        'ProductsImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('ProductsImage')) {
        $fileNameToStore = time() . '.' . $request->file('ProductsImage')->getClientOriginalExtension();
        $request->file('ProductsImage')->move(public_path('/storage/products'), $fileNameToStore);
    }

    $products = new Products;
    $products->ProductsTitle = $request->input('ProductsTitle');
    $products->ProductsContent = $request->input('ProductsContent');
    $products->ProductsImage = $fileNameToStore;
    $products->save();

    return redirect()->route('Admin.products.index')->with('success', 'Product successfully added!');
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::findOrFail($id);  // Find product by ID
    
        return view('Admin.products.edit', compact('product'));  // Return the edit view with the product data
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
    // Validate form input
    $request->validate([
        'ProductsTitle' => 'required',
        'ProductsContent' => 'required',
        'ProductsImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Find the product by ID
    $product = Products::findOrFail($id);

    // Update product details
    $product->ProductsTitle = $request->input('ProductsTitle');
    $product->ProductsContent = $request->input('ProductsContent');

    // Handle image upload if a new image is provided
    if ($request->hasFile('ProductsImage')) {
        // Delete the old image file if it exists
        if ($product->ProductsImage) {
            Storage::delete('/public/products/' . $product->ProductsImage);
        }

        // Save new image
        $fileNameToStore = time() . '.' . $request->file('ProductsImage')->getClientOriginalExtension();
        $request->file('ProductsImage')->move(public_path('/storage/products'), $fileNameToStore);
        $product->ProductsImage = $fileNameToStore;
    }

    // Save changes to the product
    $product->save();

    // Redirect back to the product index with a success message
    return redirect()->route('Admin.products.index')->with('success', 'Product updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);

        if ($product) {
            $product->forceDelete();

            // Adjust the redirect URL as needed
            return redirect('products')->with('message', 'Product Deleted!');
        } else {
            // Handle the case where the product with the given ID was not found
            return redirect('products')->with('message', 'Product not found.');
        }
    }
    
    private function uploadFile(Request $request, $fileInputName, $storagePath)
    {
        if ($request->hasFile($fileInputName)) {
            $file = $request->file($fileInputName);
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($storagePath), $fileName);

            return $fileName;
        }

        return null;
    }
}
