@extends('Admin.layouts.master')

@section('main-body')

    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Product Overview</h6>
                    
                    <a href="{{ route('Admin.products.create') }}" class="btn btn-main d-flex align-items-center py-8 text-15 fw-normal px-16 ms-3" style="background-color: white;">
                        <i class="ph ph-plus text-white me-2"></i> <!-- Plus Icon -->
                        Add Product
                    </a>
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->ProductsTitle }}</td>
                                    <td>{{ $product->ProductsContent }}</td>
                                    <td><img src="{{ asset('public/storage/products/' . $product->ProductsImage) }}" alt="{{ $product->ProductsTitle }}" width="50"></td>
                                    <td>
                                        <a href="{{ route('Admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('Admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
