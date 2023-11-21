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



<form class="user" method="POST" action="{{ route('konsumen.update', $konsumen->id_konsumen) }}" enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="container-fluid">

    <div class="row mt-3">
      <div class="col-lg-6">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Perubahan Data Konsumen</div>
           <hr>

           <div class="form-group">
            <label for="input-1">Nama Konsumen</label>
            <input type="text" class="form-control" id="input-1" name="nm_konsumen" value="{{ $konsumen->nm_konsumen}}">
           </div>
           <div class="form-group">
            <label for="input-2">Alamat</label>
            <input type="text" class="form-control" id="input-2" name="alamat" value="{{ $konsumen->alamat }}">
           </div>
           <div class="form-group">
            <label for="input-3">Nomor Handphone</label>
            <input type="text" class="form-control" id="input-3" name="no_hp" value="{{ $konsumen->no_hp}}">
           </div>
           <div class="form-group">
            <input type="submit" class="btn btn-light px-5" value="Update Data Konsumen">
            <a href="{{route('konsumen.index')}}" class="btn btn-light px-5">Kembali</a>
          </div>

         </div>
         </div>
      </div>

<div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Profil Konsumen</div>
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ url('Konsumen/'.$konsumen->foto) }}" alt="">
                  </div>

                  <div class="form-group">
                  <Label>Konsumen :</Label>
                  <input type="file" class="form-control" name="foto">
                  </div>
                </div>
          </div>
      </div>

    </div><!--End Row-->

	<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->
    </form>

@endsection