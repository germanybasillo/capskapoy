
<x-app-layout>

    <x-slot name="header">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Add New Assign Bed</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Bed Assigns</li>
                  </ol>
                </div>
              </div>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-success">
              <!-- form start -->
              <form role="form" id="quickForm" action="{{ route('bedassign.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-8 offset-md-2">
                    <div class="form-group">
                      <label>Tenants</label>
                        <select name="tenantprofile_id" id="tenant" class="form-control">
                            <option value="" disabled selected>Select A Tenant Name</option> <!-- Default option -->
                            @foreach($tenantprofiles as $tenantprofile)
                                <option value="{{ $tenantprofile->id }}" {{ old('tenantprofile_id', $selectedTenantId ?? '') == $tenantprofile->id ? 'selected' : '' }}>
                                    {{ $tenantprofile->fname . ' ' . $tenantprofile->mname . ' ' . $tenantprofile->lname }}
                                </option>
                            @endforeach
                        </select>
                  </div>
                  </div>
                  <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label>Room No.</label>
                    <select name="room_id" id="room" class="form-control">
                      <option value="" disabled selected>Select A Room Number</option> <!-- Default option -->
                      @foreach($rooms as $room)
                          <option value="{{ $room->id }}" {{ old('room_id', $selectedRoomId ?? '') == $room->id ? 'selected' : '' }}>
                              {{ $room->selected->room_no}}
                          </option>
                      @endforeach
                  </select>
                  </div></div>
                  <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label>Bed No.</label>
                    <select name="bed_id" id="bed" class="form-control">
                      <option value="" disabled selected>Select A Bed Number</option> <!-- Default option -->
                      @foreach($beds as $bed)
                          <option value="{{ $bed->id }}" {{ old('bed_id', $selectedBedId ?? '') == $bed->id ? 'selected' : '' }}>
                              {{ $bed->selectbed->bed_no}}
                          </option>
                      @endforeach
                  </select>
                  </div></div>
                  <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label>Date Start</label>
                    <select name="room_id" id="room" class="form-control">
                      <option value="" disabled selected>Select A Start Date</option> <!-- Default option -->
                      @foreach($rooms as $room)
                          <option value="{{ $room->id }}" {{ old('room_id', $selectedRoomId ?? '') == $room->id ? 'selected' : '' }}>
                              {{ $room->start_date}}
                          </option>
                      @endforeach
                  </select>
                  </div></div>
                  <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label>Due date</label>
                    <select name="room_id" id="room" class="form-control">
                      <option value="" disabled selected>Select A Start Date</option> <!-- Default option -->
                      @foreach($rooms as $room)
                          <option value="{{ $room->id }}" {{ old('room_id', $selectedRoomId ?? '') == $room->id ? 'selected' : '' }}>
                              {{ $room->due_date}}
                          </option>
                      @endforeach
                  </select>
                  </div></div>

                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
      document.getElementById('quickForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting immediately
  
        Swal.fire({
            // title: 'Are you sure?',
            // text: 'Do you want to save the changes?',
            icon: null, // Disable the default icon
            html: '<img src="{{ asset('logo.png') }}" alt="Logo" width="50" height="46"><br><h2>Are you sure?</h2>Do you want to save this bed assign?',
            showCancelButton: true,
            confirmButtonText: 'Yes, save it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit(); // If confirmed, submit the form
            }
        });
    });
  </script>

    

    </x-app-layout>