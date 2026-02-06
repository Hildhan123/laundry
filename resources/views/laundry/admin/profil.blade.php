@extends('layouts.dashboard')
@extends('laundry.admin.layout.navbar')
@section('title','Profil - Profil Saya')

@section('content')
<h3>Profil</h3>
						<div class="row">
							<div class="col-md-9">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">My Profil</h4>
										<p class="card-category">Profil Saya</p>
									</div>
									<div class="card-body">
				<div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     : {{ $admin->nama_admin }}
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
                      <h6 class="mb-0">Nomor Hp</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      : {{ $admin->no_hp_admin }}
                    </div>
                  </div>
				  <br>
				  <br>
				<div class="row justify-content-center">
				  	<div class="col-sm-2">
					  <a class="btn btn-primary" href="{{ route('admin.buat.profil') }}"> Buat Profile </a>
					</div>
					<div class="col-sm-2">
					  <a class="btn btn-secondary" href="{{ route('admin.edit.profil') }}">Edit Profile </a>
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
										<img src="{{ $admin->foto }}"  class = "img-thumbnail img-fluid">
									</div>
								</div>
                            </div>
						</div>
@endsection