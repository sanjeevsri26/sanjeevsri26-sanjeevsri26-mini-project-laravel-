@extends('Admin.layouts.master')

@section('main-body')
<div class="dashboard-main-wrapper">
    <!-- Top Navbar Section -->
    <div class="top-navbar flex-between gap-16">
        <!-- Navbar Content can be added here -->
    </div>

    <!-- Dashboard Body -->
    <div class="dashboard-body">
        <!-- Breadcrumbs or Other Content (Optional) -->

        <!-- Success Message with Redirect After 5 Seconds -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>

            <!-- JavaScript to Redirect After 5 Seconds -->
            <script>
                setTimeout(function() {
                    window.location.href = "{{ route('category.index') }}";
                }, 5000); // Redirect to category index page after 5 seconds
            </script>
        @endif

        <!-- Error Message -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Category Creation Form -->
        <div class="white-box">
            <h3 class="box-title mb-4">Create Category</h3>
            <form class="form-horizontal" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Category Name Input -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category Name (Leave blank for parent category)</label>
                            <input type="text" name="categoryName" class="form-control @error('categoryName') is-invalid @enderror" value="{{ old('categoryName') }}">
                            @error('categoryName')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Parent Category Dropdown -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SubCategory Of</label>
                            <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" data-placeholder="Choose a Category" tabindex="1">
                                <option value="">No Subcategory</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->categoryName }}
                                    </option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Submit Button -->
                <div class="form-actions mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">
                                <i class="ph ph-check"></i> Submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
