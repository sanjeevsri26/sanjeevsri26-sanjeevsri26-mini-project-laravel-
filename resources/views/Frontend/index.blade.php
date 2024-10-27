@extends('Frontend.layouts.main')

@section('main-container')
      
      <!-- banner section start --> 
      <div class="banner_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div id="banner_slider" class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="banner_taital_main">
                              <h1 class="banner_taital">Car Rent <br><span style="color: #fe5b29;">For You</span></h1>
                              <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority</p>
                              <div class="btn_main">
                                 <div class="contact_bt"><a href="#">Read More</a></div>
                                 <div class="contact_bt active"><a href="#">Contact Us</a></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="banner_img"><img src="{{asset('public/Frontend-asset/asset/images/banner-img.png')}}"></div>
               </div>
            </div>
         </div>
      </div>
     
      
 <!-- gallery section start -->
 <div class="gallery_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="gallery_taital">Our best offers</h1>
            </div>
        </div>
        <div class="gallery_section_2">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-md-3">
                        <div class="gallery_box" style="border: 1px solid #ccc; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                            <div class="gallery_img">
                                <img src="{{ asset('public/storage/blogs/' . $blog->blogsimage) }}" style="width: 100%; border-radius: 5px;">
                            </div>
                            <h3 class="types_text">{{ $blog->blogstitle }}</h3>
                            <p class="looking_text">{{ $blog->blogsContent }}</p>
                            <div class="read_bt"><a href="#">Book Now</a></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<!-- gallery section end -->
     
      
      
     
     
      @endsection