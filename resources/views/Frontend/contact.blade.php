@extends('Frontend.layouts.main')

@section('main-container')
      
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="contact_taital">Get In Touch</h1>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="contact_section_2">
               <div class="row">
                  <div class="col-md-12">
                     <div class="mail_section_1">
                        <input type="text" class="mail_text" placeholder="Name" name="Name">
                        <input type="text" class="mail_text" placeholder="Email" name="Email">
                        <input type="text" class="mail_text" placeholder="Phone Number" name="Phone Number">
                        <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                        <div class="send_bt"><a href="#">Send</a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endsection