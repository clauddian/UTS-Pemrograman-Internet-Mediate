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
           <div class="card-title">Data Konsumen</div>
           <hr>

            <form class="user" method="POST" action="{{ route('konsumen.store') }}" enctype="multipart/form-data">

            	{{ csrf_field() }}
           <div class="form-group">
            <label for="input-1">Nama Konsumen</label>
            <input type="text" class="form-control" id="input-1" name="nama">
           </div>
           <div class="form-group">
            <label for="input-2">Alamat</label>
            <input type="text" class="form-control" id="input-2" name="alamat">
           </div>
           <div class="form-group">
            <label for="input-3">Nomor Handphone</label>
            <input type="text" class="form-control" id="input-3" name="no_hp">
           </div>
           <div class="form-group">
            <label for="input-4">Foto</label>
            <input type="file" class="form-control" id="input-4" name="foto">
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