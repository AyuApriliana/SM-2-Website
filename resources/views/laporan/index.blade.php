@extends('layouts.master')
@section('content')


<!-- Navbar -->

<nav class="navbar" style="background-color: #0099FF;">
  <div class="container-fluid">
    <a class="navbar-brand">Jalan Mulus</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-warning" type="submit">Search</button>
    </form>
  </div>
</nav>


<div container style="margin-top:20px">
<div class="card">
<!-- <div class="container"> -->
  <div class="card-header">
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tambah Data
  </button> -->
  <div class="row">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Image</th>
          <th scope="col">Location</th>
          <th scope="col">Description</th>
          <th scope="col">Laporan Diproses</th>
          <th scope="col">Laporan Selesai</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1 ?>
        @forelse($data as $item)
        <tr>
          <th scope="row">{{ $no++ }}</th>
          <td>{{ $item->image }}</td>
          <td>{{ $item->location }}</td>
          <td>{{ $item->description }}</td>
          <td>{{ $item->laporan_diproses }}</td>
          <td>{{ $item->laporan_selesai }}</td>
          <!-- <td>
            <a  data-bs-toggle="modal" data-bs-target="#{{ $item->id_laporan }}EditLaporan" class="btn btn-sm btn-warning">EDIT</a>
            <a  data-bs-toggle="modal" data-bs-target="#{{ $item->id_laporan }}DeleteLaporan" class="btn btn-sm btn-danger">DELETE</a>
          </td> -->
        </tr>
        @empty
            
        @endforelse
      </tbody>
    </table>
  </div>








    <!-- Modal tambah data -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal Tambah</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="image" class="form-label">image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" required>
                @error('image')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">location</label>
                    <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" id="location" required>
                @error('location')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" required>
                @error('description')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="laporan_diproses" class="form-label">laporan_diproses</label>
                    <input type="text" class="form-control @error('laporan_diproses') is-invalid @enderror" name="laporan_diproses" id="laporan_diproses" required>
                @error('laporan_diproses')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="laporan_selesai" class="form-label">laporan_selesai</label>
                    <input type="text" class="form-control @error('laporan_selesai') is-invalid @enderror" name="laporan_selesai" id="laporan_selesai" required>
                @error('laporan_selesai')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
                </div>

        </div>
       
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endsection


  
  <!-- Modal edit data -->
  @forelse($data as $item)
 <div class="modal fade" id="{{ $item->id_pasien }}EditPasien" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal Edit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{ url('pasien/'.$item->id_pasien) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" value="{{ $item->nama }}" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" required>
              @error('nama')
              <div class="alert alert-danger mt-2">
                  {{ $message }}
              </div>
              @enderror
              </div>

              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" value="{{ $item->username }}" class="form-control @error('username') is-invalid @enderror" name="username" id="username" required>
            @error('username')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" value="{{ $item->password }}" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
            @error('password')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
            </div>
      </div>
     
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>
@empty
@endforelse





<!--Modal Delete Data-->
@forelse($data as $item)
<div class="modal fade" id="{{ $item->id_pasien }}DeletePasien" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal Delete</h1>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
         <form action="{{ url('pasien/'.$item->id_pasien) }}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('DELETE')
             <div class="mb-3">
              <label for="pasien" class="form-label">Apakah anda yakin ingin menghapus?</label>
              @error('pasien')  
             </div>
          @enderror
          </div>
     </div>
    
     <div class="modal-footer">
       {{-- <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button> --}}
       <button type="submit" class="btn btn-primary">Delete</button>
     </div>
   </form>
   </div>
 </div>
</div>
@empty
@endforelse