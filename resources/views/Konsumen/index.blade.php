@extends('layout')
@section('content')
	
    <div class="container-fluid">
     
          <div class="card">
            <div class="card-body">
              <center><h5 class="card-title">Tabel Data Konsumen</h5></center>
			  <div class="table-responsive">

              <p></p>
              <div class="col-lg-5">

@if($message = Session::get('success'))
<div class="alert alert-success" >{{$message}}</div>
@endif

              <a href="{{ route('konsumen.create') }}" class="btn btn-light px-3">Tambah Data</a>
          	  </div><p></p>
               <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Foto</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Nomor HP</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach ($konsumens as $konsumen)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td><img width="70px" src="{{ url('/Profile/'.$konsumen->foto) }}"></td>
                      <td>{{ $konsumen->nama }}</td>
                      <td>{{ $konsumen->alamat }}</td>
                      <td>{{ $konsumen->no_hp }}</td>
					            <td>
                      <form action="{{ route('konsumen.destroy',$konsumen->id_konsumen) }}" method="POST">

                      @csrf
                      @method('DELETE')

                      <a class="btn btn-light px-5" href="{{ route('konsumen.edit',$konsumen->id_konsumen) }}"> Ubah </a>

                      <button type="submit" class="btn btn-light px-5" onclick="javascript: return confirm('Apakah Anda Ingin Menghapus Data Ini?')"> Hapus </button>
                      </form></td>
                    </tr>
					@endforeach
                  </tbody>
                </table>
            </div>
        </div>
      </div><!--End Row-->

    <!--start overlay-->
      <div class="overlay toggle-menu"></div>
    <!--end overlay-->
    
    </div>
    <!-- End container-fluid-->

@endsection