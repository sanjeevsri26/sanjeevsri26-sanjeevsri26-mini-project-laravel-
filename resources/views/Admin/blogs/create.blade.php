@extends('Admin.layouts.master')

@section('main-body')

    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Add New Blog</h6>
                    
                    <div class="blog-form-section">
                        <h2 class="text-2xl font-semibold mb-4">Add Blog</h2>
                        <form action="{{ route('Admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 text-sm font-medium mb-2">Blog Title</label>
                                <input type="text" id="title" name="blogstitle" class="form-control w-full h-12 border-gray-300 rounded-md" placeholder="Write blog title here" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="content" class="block text-gray-700 text-sm font-medium mb-2">Blog Content</label>
                                <textarea id="content" name="blogsContent" class="form-control w-full border-gray-300 rounded-md" placeholder="Write blog content here" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="image" class="block text-gray-700 text-sm font-medium mb-2">Choose Blog Image</label>
                                <input type="file" id="image" name="blogsimage" class="form-control w-full h-12 border-gray-300 rounded-md" required>
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
