@extends('Admin.layouts.master')

@section('main-body')
<div class="dashboard-main-wrapper">
    <!-- Top Navbar -->
    <div class="top-navbar d-flex justify-content-between gap-16 align-items-center">
        <div class="d-flex align-items-center gap-16">
            <!-- Toggle Button -->
            <button type="button" class="toggle-btn d-xl-none d-flex text-26 text-gray-500">
                <i class="ph ph-list"></i>
            </button>

            <!-- Search Form -->
            <form action="#" class="w-350 d-sm-block d-none">
                <div class="position-relative">
                    <button type="submit" class="input-icon text-xl d-flex text-gray-100 pointer-event-none">
                        <i class="ph ph-magnifying-glass"></i>
                    </button>
                    <input type="text" class="form-control ps-40 h-40 border-transparent focus-border-main-600 bg-main-50 rounded-pill placeholder-15" placeholder="Search...">
                </div>
            </form>

            <!-- Add Category Button -->
            <a href="{{ route('category.create') }}" class="btn btn-main d-flex align-items-center py-8 text-15 fw-normal px-16 ms-3">
                <i class="ph ph-plus text-white me-2"></i>
                Add Category
            </a>
        </div>

        <div class="d-flex align-items-center gap-16">
            <!-- Notifications and Language (custom content here) -->
            ...
            <!-- User Profile -->
            ...
        </div>
    </div>

    <!-- Category Overview Table -->
    <div class="container mt-4">
        <h2 class="mb-4">Category Overview</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($categories && $categories->isNotEmpty())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Subcategories</th> <!-- Subcategories Column -->
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->categoryName }}</td>
                            <td>
                                @if($category->subcategories && $category->subcategories->isNotEmpty())
                                    <ul>
                                        @foreach($category->subcategories as $subcategory)
                                            <li>{{ $subcategory->categoryName }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    No subcategories
                                @endif
                            </td>
                            <td>{{ $category->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No categories found.</p>
        @endif
    </div>
</div>
@endsection
