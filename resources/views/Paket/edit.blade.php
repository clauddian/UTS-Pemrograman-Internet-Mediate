@extends('layout')
@section('content')

<form class="user" method="POST" action="{{ route('paket.update', $paket->id_paket) }}" enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="container-fluid">

    <div class="row mt-3">
      <div class="col-lg-6">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Perubahan Data Paket</div>
           <hr>

           <div class="form-group">
            <label for="input-1">Kode</label>
            <input type="text" class="form-control" id="input-1" name="kd_paket" value="{{ $paket->kd_paket}}">
           </div>
           <div class="form-group">
            <label for="input-2">Nama Paket</label>
            <input type="text" class="form-control" id="input-2" name="nm_paket" value="{{ $paket->nm_paket }}">
           </div>
           <div class="form-group">
            <label for="input-3">Jenis Paket</label>
            <input type="text" class="form-control" id="input-3" name="jenis_paket" value="{{ $paket->jenis_paket}}">
           </div>
           <div class="form-group">
            <label for="input-3">Nama Pengirim</label>
            <input type="text" class="form-control" id="input-3" name="nm_konsumen" value="{{ $paket->nm_konsumen }}">
           </div>
           <div class="form-group">
            <label for="input-3">Tujuan</label>
            <textarea class="form-control" id="input-3" name="tujuan"> {{ $paket->tujuan  }} </textarea>
           </div>
           <div class="form-group">
            <label for="input-4">Nama Penerima</label>
            <input type="text" class="form-control" id="input-4" name="nm_penerima" value="{{ $paket->nm_penerima}}">
           </div>
           <div class="form-group">
            <label for="input-5">Nomor Resi</label>
            <input type="file" class="form-control" id="input-5" name="foto_resi" value="{{ $paket->tgl_lahir }}">
           </div>

           <div class="form-group">
            <input type="submit" class="btn btn-light px-5" value="Update Data Paket">
            <a href="{{route('paket.index')}}" class="btn btn-light px-5">Kembali</a>
          </div>

         </div>
         </div>
      </div>
    </div><!--End Row-->

<div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Resi</div>
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ url('Resi/'.$siswa->foto_resi) }}" alt="">
                  </div>

                  <div class="form-group">
                  <Label>Resi :</Label>
                  <input type="file" class="form-control" name="foto_resi">
                  </div>
                  
                </div>
         </div>
       </div>
     </div>
   </div>

	<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->
    </form>

@endsection