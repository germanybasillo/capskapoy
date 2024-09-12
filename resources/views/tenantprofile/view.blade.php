<x-app-layout>
    <style>
       .profile-image {
          border-radius: 50%;
          width: 120px;  /* Increased size */
          height: 120px; /* Increased size */
          object-fit: cover;
          margin-bottom: 20px; /* Add space below the image */
       }
 
       .card-body {
          text-align: center; /* Center-align all card content */
       }
 
       .card-body h5 {
          font-size: 1.5rem; /* Increased font size */
          margin-bottom: 20px; /* Add space below the name */
       }
 
       .card-body p {
          font-size: 1.2rem; /* Increased font size */
          margin-bottom: 10px; /* Add space between information rows */
          text-align: left; /* Align text to the left */
       }
 
       .container-fluid h1 {
          font-size: 2.5rem; /* Increased header size */
       }
 
       .breadcrumb-item a {
          font-size: 1.2rem; /* Increased breadcrumb size */
       }
 
       .breadcrumb-item.active {
          font-size: 1.2rem; /* Increased breadcrumb size */
       }
 
       .modal-body h3 {
          font-size: 1.8rem; /* Increased modal text size */
       }
 
       .modal-body button {
          font-size: 1.2rem; /* Increased modal button size */
          padding: 10px 20px; /* Increased modal button padding */
       }
    </style>
 <style>
 /* General Styles */
 body {
     font-family: Arial, sans-serif;
     margin: 0;
 }
 
 * {
     box-sizing: border-box;
 }
 
 img {
     vertical-align: middle;
 }
 
 /* Image Container */
 .container {
     position: relative;
     max-width: 100%;
     margin: auto;
 }
 
 /* Slideshow Container */
 .slideshow-container {
     position: relative;
     max-width: 100%;
     margin: auto;
 }
 
 /* Hide the images by default */
 .mySlides {
     display: none;
     position: relative;
 }
 
 /* Slideshow Image */
 .mySlides img {
     width: 100%;
     height: 300px; /* Set a fixed height */
     object-fit: cover; /* Maintain aspect ratio and fill the container */
 }
 
 /* Cursor for clickable elements */
 .cursor {
     cursor: pointer;
 }
 
 /* Next & Previous Buttons */
 .prev,
 .next {
     cursor: pointer;
     position: absolute;
     top:42%;
     width: auto;
     padding: 16px;
     color: white;
     font-weight: bold;
     font-size: 20px;
     border-radius: 0 3px 3px 0;
     user-select: none;
     background-color: rgba(0, 0, 0, 0.5); /* Slightly transparent background */
 }
 
 .next {
     right: 0;
     border-radius: 3px 0 0 3px;
 }
 
 .prev {
     left: 0;
     border-radius: 3px 0 0 3px;
 }
 
 /* On hover, add a black background color with a little bit see-through */
 .prev:hover,
 .next:hover {
     background-color: rgba(0, 0, 0, 0.8);
 }
 
 /* Number Text (1/3 etc) */
 .numbertext {
     color: #f2f2f2;
     font-size: 12px;
     padding: 8px 12px;
     position: absolute;
     top: 0;
 }
 
 /* Container for Image Text */
 .caption-container {
     text-align: center;
     background-color: #222;
     padding: 2px 16px;
     color: white;
 }
 
 /* Row Clearfix */
 .row:after {
     content: "";
     display: table;
     clear: both;
 }
 
 /* Column Layout */
 .column {
     float: left;
     width: 16.66%;
 }
 
 /* Transparency for Thumbnail Images */
 .demo {
     opacity: 0.6;
 }
 
 .active,
 .demo:hover {
     opacity: 1;
 }
 
 /* Responsive Styles */
 @media only screen and (max-width: 768px) {
     .prev, .next {
         font-size: 18px;
         padding: 12px;
     }
 
     .caption-container {
         padding: 2px 10px;
     }
 
     .numbertext {
         font-size: 10px;
     }
 
     .column {
         width: 33.33%; /* Three columns on tablets */
     }
 }
 
 @media only screen and (max-width: 480px) {
     .prev, .next {
         font-size: 16px;
         padding: 10px;
     }
 
     .caption-container {
         padding: 2px 8px;
     }
 
     .numbertext {
         font-size: 8px;
     }
 
     .column {
         width: 50%; /* Two columns on small screens */
     }
 }
    </style>
 <script>
  let slideIndex = 1;
 
 function showSlides(n) {
     let i;
     let slides = document.getElementsByClassName("mySlides");
     let caption = document.getElementById("caption-text");
 
     if (n > slides.length) { slideIndex = 1 }
     if (n < 1) { slideIndex = slides.length }
     for (i = 0; i < slides.length; i++) {
         slides[i].style.display = "none";
     }
     slides[slideIndex - 1].style.display = "block";
     caption.innerText = slides[slideIndex - 1].getAttribute('data-caption');
 }
 
 function plusSlides(n) {
     showSlides(slideIndex += n);
 }
 
 // Initialize slideshow
 document.addEventListener("DOMContentLoaded", function() {
     showSlides(slideIndex);
 });
 </script>
 
    
 <x-slot name="header">
    <div class="content-header">
        <div class="container-fluid">
           <div class="row mb-2">
              <div class="col-sm-6">
                @foreach($tenantprofiles as $tenantprofile)
                 <h1 class="m-0 text-dark"><span class="fa fa-user"></span> Tenant Profile</h1>
              </div>
              <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tenant Profile</li>
                 </ol>
                 @endforeach
              </div>
              {{-- @if ($tenantprofiles->isEmpty())
              <a class="btn btn-sm elevation-2" href="/tenant/tenantprofiles/create" style="margin-top: 20px;margin-left: 10px;background-color: #05445E;color: #ddd;"><i
                    class="fa fa-user-plus"></i>
                 Add New</a>
                 @endif --}}
           </div>
        </div>
        @if ($tenantprofiles->isEmpty())
        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 70vh; text-align: center;">
          <h1 class="m-0 text-dark"><span class="fa fa-user"></span> Tenant Profile</h1><br>
          <a class="btn btn-sm elevation-2" href="/tenantprofiles/create" style="background-color: #05445E; color: #ddd; padding: 10px 20px; margin-bottom: 20px;">
              <i class="fa fa-user-plus"></i> Add New
          </a>
          <p style="max-width: 600px; color: #333;">
              Note: You can only edit once you have completed creating your tenant profile. After that, you can add your room, and finally, your bed.
          </p>
      </div>
     @endif
 </x-slot>
 
          <div class="row">
             <div class="col-lg-4">
                <div class="card mb-4" style="margin-top: -20px;">
                   @foreach($tenantprofiles as $tenantprofile)
                   <div class="card-body text-center" style="height:316px;">
                         <!-- Profile Image -->
                         @if($tenantprofile->profile)
                            @if(file_exists(public_path('storage/' . $tenantprofile->profile)))
                               <img src="{{ asset('storage/' . $tenantprofile->profile) }}" alt="User Image" class="profile-image">
                            @else
                               <img src="{{ asset($tenantprofile->profile) }}" alt="User Image" class="profile-image">
                            @endif
                         @else
                            <img id="preview" src="{{ asset('avatar.jpg') }}" alt="Preview" class="profile-image">
                         @endif
 
                         <!-- Tenant Name -->
                         <h5>Tenant</h5>
                         <div class="container">
                            <div class="row justify-content-center mb-2">
                                <div class="col-auto">
                                    <a class="btn btn-primary mx-1" href="/tenantprofiles/{{$tenantprofile->id}}">
                                        <i class="fa fa-user-edit"></i> Edit
                                    </a>
                                </div>
                                @if ($rooms->isEmpty())
                                <div class="col-auto">
                                    <a class="btn btn-primary mx-1" href="/rooms/create">
                                        <i class="fa fa-home"></i> Add Room
                                    </a>
                                </div>
                                @endif
                                @if (!$rooms->isEmpty())
                                @if ($beds->isEmpty())
                                <div class="col-auto">
                                    <a class="btn btn-primary mx-1" href="/beds/create">
                                        <i class="fa fa-bed"></i> Add Bed
                                    </a>
                                </div>
                                @endif
                                @endif
                                @if (!$beds->isEmpty())
                                <div class="col-auto">
                                 <a class="btn btn-primary mx-1" href="/chatify">
                                     <i class="fa fa-address-book"></i> Contact Rental_Owner
                                 </a>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <a class="btn btn-primary mx-1" href="/tenant/tenantprofiles/{{$tenantprofile->id}}">
                                        <i class="fa fa-money-bill"></i> Payment
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <a class="btn btn-primary mx-1" href="/tenant/tenantprofiles/{{$tenantprofile->id}}">
                                        <i class="fa fa-file"></i> Payment History
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                      @endforeach
                   </div>
                </div>
       
                @foreach($rooms as $room)
                <div class="container">
                    <h1 class="m-0 text-dark">
                        <span class="fa fa-home"></span> Room Picture :
                        <p id="caption-text" style="margin-top: -48px;margin-left:330px;"></p>
                    </h1>
                    <div class="card-body" style="margin-top:-20px;" data-id="{{ $room->selected->id }}">
                        @php
                            $profiles = [
                                ['profile' => 'profile1', 'caption' => 'caption1'],
                                ['profile' => 'profile2', 'caption' => 'caption2'],
                                ['profile' => 'profile3', 'caption' => 'caption3'],
                                ['profile' => 'profile4', 'caption' => 'caption4'],
                                ['profile' => 'profile5', 'caption' => 'caption5'],
                                ['profile' => 'profile6', 'caption' => 'caption6'],
                            ];
                        @endphp
                        <div class="slideshow-container">
                            @foreach ($profiles as $profile)
                                @php
                                    $profilePath = $room->selected->{$profile['profile']};
                                    $captionText = $room->selected->{$profile['caption']};
                                    $imagePath = storage_path('app/public/' . $profilePath);
                                    $isImageExists = file_exists($imagePath);
                                @endphp
                                @if ($profilePath)
                                    <div class="mySlides" data-caption="{{ $captionText }}">
                                        <img src="{{ $isImageExists ? asset('storage/' . $profilePath) : asset($profilePath) }}" alt="{{ $captionText }}">
                                    </div>
                                @endif
                            @endforeach
                            <!-- Next/previous controls -->
                            <a class="prev" onclick="plusSlides(-1)">❮</a>
                            <a class="next" onclick="plusSlides(1)">❯</a>
                        </div>
                    </div>
                </div>
            @endforeach
             </div>
 
             <div class="col-lg-8">
                <div class="card mb-4" style="margin-top: -20px;">
                   @foreach($tenantprofiles as $tenantprofile)
                   <div class="card-body">
                         <div class="row">
                            <div class="col-sm-3">
                               <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                               <p class="text-muted mb-0">{{ $tenantprofile->fname." ".$tenantprofile->mname." ".$tenantprofile->lname }}</p>
                            </div>
                         </div>
                         <hr>
                         <div class="row">
                            <div class="col-sm-3">
                               <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                               <p class="text-muted mb-0">{{ $tenantprofile->email }}</p>
                            </div>
                         </div>
                         <hr>
                         <div class="row">
                            <div class="col-sm-3">
                               <p class="mb-0">Mobile</p>
                            </div>
                            <div class="col-sm-9">
                               <p class="text-muted mb-0">{{ $tenantprofile->contact }}</p>
                            </div>
                         </div>
                         <hr>
                         <div class="row">
                            <div class="col-sm-3">
                               <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                               <p class="text-muted mb-0">{{ $tenantprofile->address }}</p>
                            </div>
                         </div>
                         <hr>
                         <div class="row">
                            <div class="col-sm-3">
                               <p class="mb-0">Gender</p>
                            </div>
                            <div class="col-sm-9">
                               <p class="text-muted mb-0">{{ $tenantprofile->gender }}</p>
                            </div>
                         </div>
                      @endforeach
                   </div>
                </div>
                @if (!$tenantprofiles->isEmpty())
                <div class="row">
                   <div class="col-md-6">
                      @foreach($rooms as $room) 
                      <h1 class="m-0 text-dark"><span class="fa fa-home"></span>Room</h1><br>
                      <div class="card mb-4 mb-md-0">
                         <div class="card-body">
                            <div class="row">
                               <div class="col-sm-3">
                                  <p class="mb-0">Room No</p>
                               </div>
                               <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $room->selected->room_no}}</p>
                               </div>
                            </div>
                            <hr>
                            <div class="row">
                               <div class="col-sm-3">
                                  <p class="mb-0">Room Status</p>
                               </div>
                               <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $room->selected->description}}</p>
                               </div>
                            </div>
                            <hr>
                            <div class="row">
                               <div class="col-sm-3">
                                  <p class="mb-0">Start Date</p>
                               </div>
                               <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $room->start_date}}</p>
                               </div>
                            </div>
                            <hr>
                            <div class="row">
                               <div class="col-sm-3">
                                  <p class="mb-0">Due Date</p>
                               </div>
                               <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $room->due_date}}</p>
                               </div>
                            </div>
                            @endforeach
                         </div>
                         @endif
                      </div>
                      
                   </div>
                   @if (!$rooms->isEmpty())
                   <div class="col-md-6">
                      @foreach($beds as $bed)
                      <h1 class="m-0 text-dark"><span class="fa fa-bed"></span> Bed </h1><br>
                      <div class="card mb-4 mb-md-0">
                         <div class="card-body">
                            <div class="row">
                               <div class="col-sm-3">
                                  <p class="mb-0">Bed No</p>
                               </div>
                               <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $bed->selectbed->bed_no}}</p>
                               </div>
                            </div>
                            <hr>
                            <div class="row">
                               <div class="col-sm-3">
                                  <p class="mb-0">Daily Rate</p>
                               </div>
                               <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $bed->selectbed->daily_rate}}</p>
                               </div>
                            </div>
                            <hr>
                            <div class="row">
                               <div class="col-sm-3">
                                  <p class="mb-0">Monthly Rate</p>
                               </div>
                               <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $bed->selectbed->monthly_rate}}</p>
                               </div>
                            </div>
                            <hr>
                            <div class="row">
                               <div class="col-sm-3">
                                  <p class="mb-0"> Bed Status</p>
                               </div>
                               <div class="col-sm-9">
                                  <p class="text-muted mb-0">
                                     @if ($bed->selectbed->bed_status == 'occupied')
                                     <span class="badge bg-warning">{{ $bed->selectbed->bed_status }}</span>
                                 @elseif ($bed->selectbed->bed_status == 'available')
                                     <span class="badge bg-success">{{ $bed->selectbed->bed_status }}</span>
                                 @endif
                               </p>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                @endforeach
             </div>
             @endif
          </div>
       </div>

       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       @if (session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif
 </x-app-layout>
 
 