@extends('layouts.dashboard')
@extends('laundry.pembeli.layouts.navbar')
@section('title','PANEL Pembeli')
@section('menudashboard','active')

@section('content')
<h3 class="page-title">Dashboard</h3>

<div class="row">
    <div class="col-md-12">
		<div class="card">		
		@if($pembeli != null)
            <div class="card-header bg-light">
                <h3 class="card-title text-center">My Profil<h3>
                <p class="card-category text-center">ID User : {{ $pembeli->id_user }}<p>
            </div>
            <div class="card-body">
				<div class="row">
                    <div class="col-sm-3">
                        <img src="{{ $pembeli->foto }}"  class = "img-thumbnail img-fluid">
                    </div>
                    <div class="col-sm-9">
						             
                                <h5 class="card-title">Nama Lengkap</h5>
                                <p>: {{$pembeli->nama_pembeli}}</p>
                            <hr>
                                <h5 class="card-title">Email</h5>
                                <p>: {{ Auth::user()->email}}</p>
                            <hr>
                            	<h5 class="card-title">No Hp / Whatsapp</h5>
                                <p>: {{$pembeli->no_hp_pembeli}}</p>
                            <hr>
                                <h5 class="card-title">Alamat</h5>
                                <p>: {{$pembeli->alamat_pembeli}}</p>
                            <hr>   
                    </div>
                </div>
                  <hr>
					<div class="row justify-content-center">
						<div class="col-center">
					  <a class="btn btn-info" href="{{ route('pembeli.profil') }}">My Profile </a>
						</div>
					</div>
        		@else
            		<div class="row justify-content-center">
                		<p>Tidak ada data...., </p> 
                		<a class="" href="{{ route('pembeli.buat.profil') }}">Buat Profil </a>
            		</div>
        		@endif 
			</div>         
		</div>
	</div>
</div>
<div class="row">
                            <div class="col-md-3">
								<div class="card card-stats card-primary">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-list-alt"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<a class="card-category"  href="{{ route('pembeli.riwayat.order') }}">Total Order</a>
													<h4 class="card-title">{{ $riwayat->count() }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
                            </div>
                            <div class="col-md-3">
								<div class="card card-stats card-warning">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-exclamation"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<a class="card-category"  href="{{ route('pembeli.riwayat.order') }}">Order Belum Bayar</a>
													<h4 class="card-title">{{ $riwayat->where('status','Belum Bayar')->count() }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
                            </div>
                            <div class="col-md-3">
								<div class="card card-stats card-danger">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-times-circle"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<a class="card-category"  href="{{ route('pembeli.riwayat.order') }}">Order Cancel</a>
													<h4 class="card-title">{{ $riwayat->where('status','Cancel')->count() }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
                            </div>
                            <div class="col-md-3">
								<div class="card card-stats card-success">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-check-circle"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<a class="card-category"  href="{{ route('pembeli.riwayat.order') }}">Order Lunas</a>
													<h4 class="card-title">{{ $riwayat->where('status','Lunas')->count() }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
                            </div>
</div>
@endsection