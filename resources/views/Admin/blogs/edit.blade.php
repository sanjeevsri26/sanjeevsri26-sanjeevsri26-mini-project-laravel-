@extends('Admin.layouts.master')

@section('main-body')

    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Edit Blog</h6>
                    
                    <!-- Add the form opening tag with the action and method -->
                    <form action="{{ route('Admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Blog Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Blog Title</label>
                            <input type="text" name="blogstitle" class="form-control" id="title" value="{{ $blog->blogstitle }}" required>
                        </div>

                        <!-- Blog Content -->
                        <div class="mb-3">
                            <label for="content" class="form-label">Blog Content</label>
                            <textarea name="blogsContent" class="form-control" id="content" rows="3" required>{{ $blog->blogsContent }}</textarea>
                        </div>

                        <!-- Current Blog Image -->
                        <div class="mb-3">
                            <label class="form-label">Current Blog Image</label><br>
                            @if ($blog->blogsimage)
                                <img src="{{ asset('storage/blogs/' . $blog->blogsimage) }}" alt="Blog Image" class="img-fluid mb-3" style="max-width: 200px;">
                            @else
                                <p>No image available</p>
                            @endif
                        </div>

                        <!-- New Blog Image (Optional) -->
                        <div class="mb-3">
                            <label for="photo" class="form-label">New Blog Image (Optional)</label>
                            <input type="file" name="blogsimage" class="form-control" id="photo">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update Blog</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
