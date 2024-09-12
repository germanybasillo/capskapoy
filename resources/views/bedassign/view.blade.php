
<x-app-layout>

    <x-slot name="header">
        <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0 text-dark"><span class="fa fa-bed"></span> Beds Assignment</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Bed Assignment</li>
                     </ol>
                  </div>
                  <a class="btn btn-sm elevation-2" href="/bedassigns/create" style="margin-top: 20px;margin-left: 10px;background-color: #05445E;color: #ddd;"><i
                        class="fa fa-user-plus"></i>
                     Add New</a>
               </div>
            </div>
    </x-slot>
    <div class="container-fluid">
        <div class="card card-info elevation-2">
           <br>
           <div class="col-md-12 table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                 <thead class="btn-cancel">
                    <tr>
                       <th>Tenant Name</th>
                       <th>Room No.</th>
                       <th>Bed No.</th>
                       <th>Date Start</th>
                       <th>Due Date</th>
                       <th>Action</th>
                    </tr>
                 </thead>
                 <tbody>
                     @foreach ($bedassigns as $bedassign)
                    <tr>
                     <td>{{ $bedassign->tenantprofile->fname . ' ' . $bedassign->tenantprofile->mname . ' ' . $bedassign->tenantprofile->lname }}</td>
                       <td>{{$bedassign->room->selected->room_no}}</td>
                       <td>{{$bedassign->bed->selectbed->bed_no}}</td>
                       <td>{{$bedassign->room->start_date}}</td>
                       <td>{{$bedassign->room->due_date}}</td>
                       <td class="text-right">
                        <a class="btn btn-sm btn-success" href="/bedassigns/{{$bedassign->id}}"><i
                              class="fa fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$bedassign->id}}"><i
                              class="fa fa-trash-alt"></i></a>
                     </td>
                  </tr>
                  <div id="deleteModal{{$bedassign->id}}" class="modal animated rubberBand delete-modal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form id="deleteForm{{$bedassign->id}}" action="{{ route('bedassigns.destroy', $bedassign->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body text-center">
                                    <img src="{{asset('logo.png')}}" alt="Logo" width="50" height="46">
                                    <h3>Are you sure you want to delete this Operator?</h3>
                                    <div class="m-t-20">
                                        <button type="button" class="btn btn-white" data-dismiss="modal" style="background-color: blue;color:white;border-color:blue;">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               @endforeach
             </tbody>
          </table>                    
        </div>
    </div>
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