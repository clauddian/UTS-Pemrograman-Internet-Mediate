@extends('layout')
@section('content')
	
    <div class="container-fluid">
     
          <div class="card">
            <div class="card-body">
              <center><h5 class="card-title">Tabel Data Pengiriman Paket</h5></center>
			  <div class="table-responsive">

              <p></p>
              <div class="col-lg-5">

@if($message = Session::get('success'))
<div class="alert alert-success" >{{$message}}</div>
@endif

              <a href="{{ route('paket.create') }}" class="btn btn-light px-3">Tambah Data</a>
          	  </div><p></p>
               <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Kode Paket</th>
                      <th scope="col">Nomor Resi</th>
                      <th scope="col">Nama Paket</th>
                      <th scope="col">Jenis Paket</th>
                      <th scope="col">Nama Pengirim</th>
                      <th scope="col">Tujuan</th>
                      <th scope="col">Nama Penerima</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach ($pakets as $paket)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $paket->kd_paket }}</td>
                      <td><img width="50px" src="{{ url('/Resi/'.$paket->foto_resi) }}"></td>
                      <td>{{ $paket->nm_paket }}</td>
                      <td>{{ $paket->jenis_paket }}</td>
                      <td>{{ $paket->nm_konsumen }}</td>
                      <td>{{ $paket->tujuan }}</td>
                      <td>{{ $paket->nm_penerima }}</td>
					  <td>
                      <form action="{{ route('paket.destroy',$paket->id_paket) }}" method="POST">

                      @csrf
                      @method('DELETE')

                      <a class="btn btn-light px-5" href="{{route('paket.edit',$paket->id_paket)}}"> Ubah </a>

                      <button type="submit" class="btn btn-light px-5" onclick="javascript: return confirm('Apakah Anda Ingin Menghapus Data Ini?')"> Hapus </button>
                      </form></td>
                    </tr>
					@endforeach
                  </tbody>
                </table>
            </div>
        </div>
      </div><!--End Row-->

    </div>
    <!-- End container-fluid-->

@endsection