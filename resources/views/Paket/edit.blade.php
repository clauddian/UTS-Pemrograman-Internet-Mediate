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
            <label for="input-3">Jenis Paket</label><br>

@if($paket->jenis_paket == "Express")

            <input type="radio" id="input-3" name="jenis_paket" value="Express" checked="checked"> Express <br> 
            <input type="radio" id="input-3" name="jenis_paket" value="Reguler"> Reguler <br>
            <input type="radio" id="input-3" name="jenis_paket" value="Ekonomis"> Ekonomis <br>

@elseif($paket->jenis_paket == "Reguler")

            <input type="radio" id="input-3" name="jenis_paket" value="Express"> Express <br>
            <input type="radio" id="input-3" name="jenis_paket" value="Reguler" checked="checked"> Reguler <br>
            <input type="radio" id="input-3" name="jenis_paket" value="Ekonomis"> Ekonomis <br>

@elseif($paket->jenis_paket == "Ekonomis")

            <input type="radio" id="input-3" name="jenis_paket" value="Express"> Express <br>
            <input type="radio" id="input-3" name="jenis_paket" value="Reguler"> Reguler <br>
            <input type="radio" id="input-3" name="jenis_paket" value="Ekonomis" checked="checked"> Ekonomis <br>
@endif

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
            <input type="submit" class="btn btn-light px-5" value="Update Data Paket">
            <a href="{{route('paket.index')}}" class="btn btn-light px-5">Kembali</a>
          </div>

         </div>
         </div>
      </div>

<div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Resi</div>
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ url('Resi/'.$paket->foto_resi) }}" alt="">
                  </div>

                  <div class="form-group">
                  <Label>Resi :</Label>
                  <input type="file" class="form-control" name="foto_resi">
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