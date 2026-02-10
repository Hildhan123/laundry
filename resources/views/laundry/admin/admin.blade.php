@extends('layouts.dashboard')
@extends('laundry.admin.layout.navbar')
@section('title','Admin - Dashboard')
@section('menudashboard','active')


@section('content')
<h3 class="page-title">Dashboard</h3>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
		@if($admin != null)
				<div class="row">
                    <div class="col-sm-3">
                        <img src="{{ $admin->foto }}"  class = "img-thumbnail img-fluid">
                    </div>
                    <div class="col-sm-9">
						<h3 style="text-align: center;">My Profil</h3>     
							<hr>                
                                <h5 class="card-title">Nama Lengkap</h5>
                                <p>: {{$admin->nama_admin}}</p>
                            <hr>
                                <h5 class="card-title">Email</h5>
                                <p>: {{ Auth::user()->email}}</p>
                            <hr>
                            	<h5 class="card-title">No Hp / Whatsapp</h5>
                                <p>: {{$admin->no_hp_admin}}</p>
                            <hr>   
                    </div>
                </div>
                  <hr>
					<div class="row justify-content-center">
						<div class="col-sm-2">
					  <a class="btn btn-info" href="{{ route('admin.profil') }}">My Profile </a>
						</div>
					</div>
        		@else
            		<div class="row justify-content-center">
                		<p>Tidak ada data...., </p> 
                		<a class="" href="{{ route('admin.buat.profil') }}">Buat Profil </a>
            		</div>
        		@endif 
			</div>         
		</div>
	</div>
</div>				
<!--row1-->
                        <div class="row">
							<div class="col-md-2">
								<div class="card card-stats card-default">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-users"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<a class="card-category" href="{{route('admin.user')}}">Total User/Akun</a>
													<h4 class="card-title">{{ $user->total() }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="card card-stats card-success">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-bar-chart"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<a class="card-category"  href="{{ route('admin.penjual') }}">Total User Penjual</a>
													<h4 class="card-title">{{ $penjual->total() }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="card card-stats card-info">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-archive"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<a class="card-category"  href="{{ route('admin.toko') }}">Total Toko Terdaftar</a>
													<h4 class="card-title">{{ $toko->total() }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="card card-stats card-warning">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-bars"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<a class="card-category"  href="{{ route('admin.paket') }}">Total Paket</a>
													<h4 class="card-title">{{ $paket->total() }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="card card-stats card-danger">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-male"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<a class="card-category"  href="{{ route('admin.pembeli') }}">Total User Pembeli</a>
													<h4 class="card-title">{{ $pembeli->total() }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2">
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
													<a class="card-category"  href="{{ route('admin.riwayat.order') }}">Total Order</a>
													<h4 class="card-title">{{ $riwayat->total() }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
                            </div>
						</div>
                    
						<div class="row">
                            <div class="col-md-6">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Daftar Penjual</h4>
										<p class="card-category">Terhitung dari yang terbaru</p>
									</div>
									<div class="card-body">
										<table class="table table-head-bg-success table-striped table-hover table-responsive">
											<thead>
												<tr>
													<th scope="col">ID</th>
													<th scope="col">Nama</th>
													<th scope="col">No Hp / Whatsapp</th>
													<th scope="col">Dibuat pada</th>
												</tr>
											</thead>
											<tbody>											
											@foreach($penjual as $p)
												<tr>
													<td>{{ $p->id_penjual }}</td>
                                            		<td>{{ $p->nama_penjual }}</td>
                                            		<td>{{ $p->no_hp_penjual }}</td>
													<td>{{ $p->created_at }}
												</tr>							
											@endforeach
											</tbody>
											
										</table>
										<a href="{{ route('admin.penjual') }}"><p class="text-success"style="text-align: right;">Daftar Selengkapnya</p></a>
									</div>
								</div>
                            </div>

                            <div class="col-md-6">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Daftar Pembeli</h4>
										<p class="card-category">Terhitung dari yang terbaru</p>
									</div>
									<div class="card-body">
										<table class="table table-head-bg-danger table-striped table-hover table-responsive">
											<thead>
												<tr>
													<th scope="col">ID</th>
													<th scope="col">Nama</th>
													<th scope="col">No Hp / Whatsapp</th>
													<th scope="col">Dibuat Pada</th>
												</tr>
											</thead>
											<tbody>
											@foreach($pembeli as $p)											
												<tr>
													<td>{{ $p->id_pembeli }}</td>
                                            		<td>{{ $p->nama_pembeli }}</td>
                                            		<td>{{ $p->no_hp_pembeli }}</td>
                                            		<td>{{ $p->created_at }}</td>
												</tr>
											@endforeach
											</tbody>
										</table>
										<a href="{{ route('admin.penjual') }}"><p class="text-danger"style="text-align: right;">Daftar Selengkapnya</p></a>
									</div>
								</div>
                            </div>
						</div><!--row-->

						<div class="row">
							<div class="col-md-6">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Daftar Toko</h4>
										<p class="card-category">Terhitung dari yang terbaru</p>
									</div>
									<div class="card-body">
										<table class="table table-head-bg-info table-striped table-hover table-responsive">
											<thead>
												<tr>
													<th scope="col">ID Toko</th>
													<th scope="col">Nama Toko</th>
													<th scope="col">Alamat</th>
													<th scope="col">Dibuat pada</th>
												</tr>
											</thead>
											<tbody>
											@foreach($toko as $t)         
                                        		<tr>
                                            		<td>{{ $t->id_toko }}</td>
                                            		<td>{{ $t->nama_toko }}</td>
                                            		<td>{{ $t->alamat_toko }}</td>
                                            		<td>{{ $t->created_at }}</td>                                         		
												</tr>							
											@endforeach
											
											</tbody>
										</table>
										<a href="{{ route('admin.toko') }}"><p class="text-info"style="text-align: right;">Daftar Selengkapnya</p></a>
									</div>
								</div>
                            </div>

							<div class="col-md-6">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Daftar Paket</h4>
										<p class="card-category">Terhitung dari yang terbaru</p>
									</div>
									<div class="card-body">
										<table class="table table-head-bg-warning table-striped table-hover table-responsive">
											<thead>
												<tr>
													<th scope="col">ID Paket</th>
													<th scope="col">Nama Paket</th>
													<th scope="col">Harga</th>
													<th scope="col">Dibuat pada</th>
												</tr>
											</thead>
											<tbody>
											@foreach($paket as $p)                 
                                        		<tr>
                                            		<td>{{ $p->id_paket }}</td>
                                            		<td>{{ $p->nama_paket }}</td>
                                            		<td>{{ $p->harga_per_kiloan }}</td>
                                            		<td>{{ $p->created_at }}</td>                                         		
												</tr>
											
											@endforeach								
											</tbody>
										</table>
										<a href="{{ route('admin.paket') }}"><p class="text-warning"style="text-align: right;">Daftar Selengkapnya</p></a>
									</div>
								</div>
                            </div>
						</div>

                            <div class="col-lg">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Riwayat Order</h4>
										<p class="card-category"></p>
									</div>
									<div class="card-body">
										<table class="table table-head-bg-primary table-striped table-hover table-responsive">
											<thead>
												<tr>
													<th scope="col">ID Order</th>	
													<th scope="col">Nama Pembeli</th>
													<th scope="col">Total Bayar</th>
													<th scope="col">Dibuat Pada</th>
													<th scope="col">Status</th>
												</tr>
											</thead>
											<tbody>
											@foreach($riwayat as $r)    								                
                                        		<tr>
                                            		<td>{{ $r->id_order }}</td>      
                                            		<td>{{ $r->nama_pembeli }}</td>
													<td>{{ $r->total_bayar }}</td>
                                            		<td>{{ $r->created_at }}</td>
													<td>
                                            			@if($r->status == 'Belum Bayar')
                                            			<p class="text-danger">Belum Bayar</p>
                                            			@elseif($r->status == 'Lunas')
														<p class="text-success">Lunas</p>
                                            			<p style="font-size: 10px">{{ $r->updated_at }}</p>
                                            			@else
														<p class="text-warning">Cancel</p>
                                            			<p style="font-size: 10px">{{ $r->updated_at }}</p>        
                                            			@endif
                                            		</td>
												</tr>
											@endforeach
											</tbody>
										</table>
										<a href="{{ route('admin.riwayat.order') }}"><p class="text-primary"style="text-align: right;">Daftar Selengkapnya</p></a>
									</div>
								</div>
                            </div>
@endsection