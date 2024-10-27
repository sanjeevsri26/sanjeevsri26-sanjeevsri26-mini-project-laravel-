@extends('Admin.layouts.master')

@section('main-body')

    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Blog Overview</h6>
                    
                    <!-- Add Blog Button -->
                    <a href="{{ route('Admin.blogs.create') }}" class="btn btn-main d-flex align-items-center py-8 text-15 fw-normal px-16 ms-3" style="background-color: white;">
                        <i class="ph ph-plus text-white me-2"></i> <!-- Plus Icon -->
                        Add Blog
                    </a>
                    
                    <!-- Blog Table -->
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
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->blogstitle }}</td>
                                    <td>{{ $blog->blogsContent }}</td> <!-- Shortened content preview -->
                                    <td>
                                       @if($blog->blogsimage)
                                          <img src="{{ asset('public/storage/blogs/' . $blog->blogsimage) }}" alt="blog Image" width="100px"></td>
                                        @else
                                            No Image
                                       @endif
                                    <td>
                                        <a href="{{ route('Admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('Admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
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
