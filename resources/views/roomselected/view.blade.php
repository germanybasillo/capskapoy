<x-app-layout>
    <x-slot name="header">
        <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0 text-dark"><span class="fa fa-home"></span> Rooms Selected</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Rooms Selected</li>
                     </ol>
                  </div>
                  <a class="btn btn-sm elevation-2" href="/selecteds/create" style="margin-top: 20px;margin-left: 10px;background-color: #05445E;color: #ddd;"><i
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
                       <th>Room No</th>
                       <th>Room Description</th>
                       <th>Room Image</th>
                       <th>Action</th>
                    </tr>
                 </thead>
                 <tbody>
                    @foreach($selecteds as $selected)
                    <tr>
                       <td>{{$selected->room_no}}</td>
                       <td>{{$selected->description}}</td>
                       <td>
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
                    
                    <div class="flip-container">
                        @foreach ($profiles as $profile)
                            @php
                                $profilePath = $selected->{$profile['profile']};
                                $captionText = $selected->{$profile['caption']};
                                $imagePath = storage_path('app/public/' . $profilePath); // Adjusted to point to the correct path
                                $isImageExists = file_exists($imagePath);
                            @endphp
                            @if ($profilePath)
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img 
                                                src="{{ $isImageExists ? asset('storage/' . $profilePath) : asset($profilePath) }}" 
                                                alt="Image {{ $loop->index + 1 }}"
                                                class="flip-image"
                                            >
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="caption-text">{{ $captionText }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    </td>
                       <td class="text-right">
                          <a class="btn btn-sm btn-success" href="/selecteds/{{$selected->id}}"><i
                                class="fa fa-edit"></i></a>
                          <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$selected->id}}"><i
                                class="fa fa-trash-alt"></i></a>
                       </td>
                    </tr>
                    <div id="deleteModal{{$selected->id}}" class="modal animated rubberBand delete-modal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="deleteForm{{$selected->id}}" action="{{ route('selecteds.destroy', $selected->id) }}" method="post">
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

<style>
    .flip-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-items: center;
}

.flip-card {
    width: 100px;
    height: 80px;
    perspective: 1000px;
}

.flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.6s;
    transform-style: preserve-3d;
    cursor: pointer;
}

.flip-card:hover .flip-card-inner {
    transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    border: 2px solid gray;
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.flip-card-front {
    background-color: #fff;
}

.flip-card-front img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.flip-card-back {
    background-color: #f8f9fa;
    transform: rotateY(180deg);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
}

.caption-text {
    font-size: 16px;
    color: #333;
}
</style>

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
