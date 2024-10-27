@extends('Frontend.layouts.main')

@section('main-container')
      
    <!-- gallery section start -->
<div class="gallery_section layout_padding" style="width: 100%; padding: 40px 0;">
    <div class="row">
        <div class="col-md-12">
            <h1 class="gallery_taital text-center">Our Best Product</h1>
        </div>
    </div>
    <div class="gallery_section_2">
        <div class="row" style="margin: 0;">
            @foreach($products as $index => $product)
                <div class="col-md-3" style="padding: 0 15px;">
                    <div class="gallery_box" style="border: 1px solid #ccc; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                        <div class="gallery_img">
                            <img src="{{ asset('public/storage/products/' . $product->ProductsImage) }}" style="width: 100%; border-radius: 5px;">
                        </div>
                        <h3 class="types_text">{{ $product->ProductsTitle }}</h3>
                        <p class="looking_text">{{ $product->ProductsContent }}</p>
                        <div class="read_bt"><a href="#">$ 1000</a></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>




      @endsection