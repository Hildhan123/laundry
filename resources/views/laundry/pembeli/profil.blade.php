@extends('layouts.dashboard')
@extends('laundry.pembeli.layouts.navbar')
@section('title','Profil Saya')

@section('content')
<h3>Profil</h3>
						<div class="row">
							<div class="col-md-9">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">My Profil</h4>
										<p class="card-category">ID Pembeli : {{ $pembeli->id_pembeli }}</p>
									</div>
									<div class="card-body">
				<div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     : {{ $pembeli->nama_pembeli }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      : {{ Auth::user()->email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nomor Hp / Whatsapp</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      : {{ $pembeli->no_hp_pembeli }}
                    </div>
                  </div>
				  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      : {{ $pembeli->alamat_pembeli }}
                    </div>
                  </div>
				  <br>
				  <br>
				<div class="row justify-content-center">
				  	<div class="col-sm-2">
					  <a class="btn btn-primary" href="{{ route('pembeli.buat.profil') }}"> Buat Profile </a>
					</div>
					<div class="col-sm-2">
					  <a class="btn btn-secondary" href="{{ route('pembeli.edit.profil') }}">Edit Profile </a>
					</div>   
				</div>         
									</div>
								</div>
                            </div>
							
							<div class="col-md-3">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Foto Profil</h4>
									</div>
									<div class="card-body">
										<img src="{{ $pembeli->foto }}"  class = "img-thumbnail img-fluid">
									</div>
								</div>
                            </div>
						</div>
@endsection