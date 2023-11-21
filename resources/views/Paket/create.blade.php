@extends('layout')
@section('content')

<!--favicon-->
  <link rel="icon" href="{{ asset('Assets/images/favicon.ico') }}" type="image/x-icon">
  <!-- simplebar CSS-->
  <link rel="stylesheet" href="{{ asset('Assets/plugins/simplebar/css/simplebar.css') }}" />
  <!-- Bootstrap core CSS-->
  <link rel="stylesheet" href="{{ asset('Assets/css/bootstrap.min.css') }}"/>
  <!-- animate CSS-->
  <link rel="stylesheet" href="{{ asset('Assets/css/animate.css') }}" type="text/css"/>
  <!-- Icons CSS-->
  <link rel="stylesheet" href="{{ asset('Assets/css/icons.css') }}" type="text/css"/>
  <!-- Sidebar CSS-->
  <link rel="stylesheet" href="{{ asset('Assets/css/sidebar-menu.css') }}"/>
  <!-- Custom Style-->
  <link rel="stylesheet" href="{{ asset('Assets/css/app-style.css') }}"/>


<div class="container-fluid">

    <div class="row mt-3">
      <div class="col-lg-6">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Data Paket</div>
           <hr>

            <form method="POST" action="{{ route('paket.store') }}" enctype="multipart/form-data">

            	{{ csrf_field() }}
           <div class="form-group">
            <label for="input-1">Kode</label>
            <input type="text" class="form-control" id="input-1" name="kd_paket">
           </div>
           <div class="form-group">
            <label for="input-2">Nama Paket</label>
            <input type="text" class="form-control" id="input-2" name="nm_paket">
           </div>
           <div class="form-group">
            <label for="input-3">Jenis Paket</label>
            <input type="text" class="form-control" id="input-3" name="jenis_paket">
           </div>
           <div class="form-group">
            <label for="input-3">Nama Pengirim</label>
            <input type="text" class="form-control" id="input-3" name="nm_konsumen">
           </div>
           <div class="form-group">
            <label for="input-3">Tujuan</label>
            <textarea class="form-control" id="input-3" name="tujuan"></textarea>
           </div>
           <div class="form-group">
            <label for="input-4">Nama Penerima</label>
            <input type="text" class="form-control" id="input-4" name="nm_penerima">
           </div>
           <div class="form-group">
            <label for="input-5">Nomor Resi</label>
            <input type="file" class="form-control" id="input-5" name="foto_resi">
           </div>
           <div class="form-group">
            <input type="submit" class="btn btn-light px-5" value="Simpan">
          </div>
          </form>
         </div>
         </div>
      </div>
    </div><!--End Row-->

	<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->

@endsection