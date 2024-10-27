@extends('Admin.layouts.master')

@section('main-body')

    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-secondary rounded h-100 p-4">
                   
                    
                   
                 
                    @csrf
                        @method('PUT')

                        <!-- Product Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Product Title</label>
                            <input type="text" name="ProductsTitle" class="form-control" id="title" value="{{ $product->ProductsTitle }}" required>
                        </div>

                        <!-- Product Content -->
                        <div class="mb-3">
                            <label for="content" class="form-label">Product Content</label>
                            <textarea name="ProductsContent" class="form-control" id="content" rows="3" required>{{ $product->ProductsContent }}</textarea>
                        </div>

                        <!-- Current Product Image -->
                        <div class="mb-3">
                            <label class="form-label">Current Product Image</label><br>
                            @if ($product->ProductsImage)
                                <img src="{{ asset('storage/products/' . $product->ProductsImage) }}" alt="Product Image" class="img-fluid mb-3" style="max-width: 200px;">
                            @else
                                <p>No image available</p>
                            @endif
                        </div>

                        <!-- New Product Image (Optional) -->
                        <div class="mb-3">
                            <label for="photo" class="form-label">New Product Image (Optional)</label>
                            <input type="file" name="ProductsImage" class="form-control" id="photo">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
