@extends('Admin.layouts.master')

@section('main-body')

    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Add New Product</h6>
                    
                    <div class="product-form-section">
                <h2 class="text-2xl font-semibold mb-4">Add Product</h2>
                <form action="{{ route('Admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-medium mb-2">Add Title</label>
                        <input type="text" id="title" name="ProductsTitle" class="form-control w-full h-12 border-gray-300 rounded-md" placeholder="Write title here" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 text-sm font-medium mb-2">Product Content</label>
                        <textarea id="content" name="ProductsContent" class="form-control w-full border-gray-300 rounded-md" placeholder="Write product content here" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-medium mb-2">Choose Image</label>
                        <input type="file" id="image" name="ProductsImage" class="form-control w-full h-12 border-gray-300 rounded-md" required>
                    </div>
                    
                    <div class="flex justify-end gap-4">
                        <button type="submit" class="btn btn-main rounded-pill py-2 px-4">Submit</button>
                    </div>
                </form>
            </div>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
