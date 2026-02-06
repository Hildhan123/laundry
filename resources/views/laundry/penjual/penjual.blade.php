@extends('layouts.dashboard')
@extends('laundry.penjual.layouts.navbar')
@section('title','Jasa - Dashboard')
@section('menudashboard','active')

@section('content')
<h3>Dashboard</h3>
<div class="row">
	<div class="col-md-6">
		<div class="card">		
		@if($penjual != null)
            <div class="card-header bg-light">
                <h3 class="card-title text-center">My Profil<h3>
                <p class="card-category text-center">ID User : {{ $penjual->id_user }}<p>
            </div>
            <div class="card-body">
				<div class="row">
                    <div class="col">
                        <img src="{{ $penjual->foto }}"  class = "img-thumbnail img-fluid">
                    </div>
                    <div class="col">
						             
                                <h5 class="card-title">Nama Lengkap</h5>
                                <p>: {{$penjual->nama_penjual}}</p>
                            <hr>
                                <h5 class="card-title">Email</h5>
                                <p>: {{ Auth::user()->email}}</p>
                            <hr>
                            	<h5 class="card-title">No Hp / Whatsapp</h5>
                                <p>: {{$penjual->no_hp_penjual}}</p>
                            <hr>
                                <h5 class="card-title">Alamat</h5>
                                <p>: {{$penjual->alamat_penjual}}</p>
                            <hr>   
                    </div>
                </div>
                  <hr>
					<div class="row justify-content-center">
						<div class="col-center">
					  <a class="btn btn-info" href="{{ route('penjual.profil') }}">My Profile </a>
						</div>
					</div>
        		@else
            		<div class="row justify-content-center">
                		<p>Tidak ada data...., </p> 
                		<a class="" href="{{ route('penjual.buat.profil') }}">Buat Profil </a>
            		</div>
        		@endif 
			</div>         
		</div>
	</div>
    <div class="col-md-6">
        <div class="card">		
		@if($toko != null)
            <div class="card-header bg-light text-center">
                <h3 class="card-title">My Toko<h3>
                <p class="card-category">ID Toko : {{ $toko->id_toko }}<p>
            </div>
            <div class="card-body">
				<div class="row">
                    <h5 class="card-title"></h5>
                    <div class="col">
                                <h5 class="card-title">Nama Toko</h5>
                                <p>: {{$toko->nama_toko}}</p>
                            <hr>
                                <h5 class="card-title">Alamat Toko</h5>
                                <p>: {{ $toko->alamat_toko}}</p>
                            <hr>
                            	<h5 class="card-title">No Hp / Whatsapps Toko</h5>
                                <p>: {{$toko->no_hp_toko}}</p>
                            <hr>
                                <h5 class="card-title">Sosmed</h5>
                                <p>: {{$toko->sosmed}}</p>
                            <hr>   
                    </div>
                    <div class="col">
                    @if( count($file) == 0 )
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 img-thumbnail img-fluid" src="/image/carausel/1.jpg">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-thumbnail img-fluid" src="/image/carausel/2.jpg">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-thumbnail img-fluid" src="/image/carausel/3.jpg">
                                </div>
                            </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                     </a>
                        </div>
                            <p>Galeri Default</p>
                    @else
          @php $no=2; @endphp
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100 img-thumbnail img-fluid" src="/image/galeri/{{Auth::user()->id}}/1.jpg">
              </div>
            @foreach($file->skip(1) as $f)
              <div class="carousel-item">
                <img class="d-block w-100 img-thumbnail img-fluid" src="/image/galeri/{{Auth::user()->id}}/{{$no++}}.jpg">
              </div>
            @endforeach
            </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
          </div>
          <p>Galeri Laundry</p>
          @endif
          </div>
                    </div>
                </div>
                  <hr>
					<div class="row justify-content-center">
						<div class="col-center">
					  <a class="btn btn-info" href="{{ route('my.toko') }}">My Toko </a>
						</div>
					</div>
        		@else
            		<div class="row justify-content-center">
                		<p>Tidak ada data...., </p> 
                		<a class="" href="{{ route('buka.toko') }}">Buka Toko </a>
            		</div>
        		@endif 
			</div>         
		</div>
    </div>

                        <div class="row content-justify-center">
                            <div class="col-md-6">
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
													<a class="card-category"  href="{{ route('my.toko') }}">Total Paket</a>
													<h4 class="card-title">@if($paket != null) {{ $paket->total() }} @endif</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                            <div class="col-md-6">
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
													<h4 class="card-title">@if($riwayat != null){{ $riwayat->total() }} @endif</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
                            </div>
                        </div>
<div class="row">
                            <div class="col-lg">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Paket</h4>
										<p class="card-category">Laporan Paket</p>
									</div>
									<div class="card-body">
                                    <div class="table-responsive">
										<table class="table table-head-bg-warning table-striped table-hover">
											<thead>
												<tr>			
                                                    <th scope="col">ID Paket</th>
                                                    <th scope="col">Nama Paket</th>	
													<th scope="col">Jumlah Order</th>
													<th scope="col">Order Belum Bayar</th>
													<th scope="col">Order Sukses</th>
													<th scope="col">Order Cancel</th>
												</tr>
											</thead>
											<tbody>
											@forelse($paket as $p)    								                
                                        		<tr>
                                            		<td>{{ $p->id_paket }}</td>
                                                    <td>{{ $p->nama_paket }}</td>
                                                    <td>{{ $riwayat->where('id_paket',$p->id_paket)->count() }}</td>
                                            		<td>{{ $riwayat->where('id_paket',$p->id_paket)->where('status','Belum Bayar')->count() }}</td>
													<td>{{ $riwayat->where('id_paket',$p->id_paket)->where('status','Lunas')->count() }}</td>
                                            		<td>{{ $riwayat->where('id_paket',$p->id_paket)->where('status','Cancel')->count() }}</td>
												</tr>
                                            @empty
                                                <td colspan="6" class="text-center">Tidak ada data...</td>
											@endforelse
											</tbody>
										</table>
									</div>
                                    </div>
								</div>
                            </div>

                            <div class="col-lg">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Riwayat Order</h4>
										<p class="card-category">Riwayat Order terakhir</p>
									</div>
									<div class="card-body">
                                    <div class="table-responsive">
										<table class="table table-head-bg-primary table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">ID Order</th>
                                                    <th scope="col">ID Paket</th>
                                                    <th scope="col">Nama Paket</th>	
													<th scope="col">Nama Pembeli</th>
													<th scope="col">Total Bayar</th>
													<th scope="col">Dibuat Pada</th>
													<th scope="col">Status</th>
												</tr>
											</thead>
											<tbody>
											@forelse($riwayat as $r)    								                
                                        		<tr>
                                            		<td>{{ $r->id_order }}</td>
                                                    <td>{{ $r->id_paket }}</td>
                                                    <td>{{ $r->id_paket }}</td>
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
                                            @empty
                                                <td colspan="7" class="text-center">Tidak ada data...</td>
											@endforelse
											</tbody>
										</table>
										<a href="{{ route('penjual.riwayat.order') }}"><p class="text-primary"style="text-align: right;">Daftar Selengkapnya</p></a>
									</div>
                                    </div>
								</div>
                            </div>
</div>
<!--<div class="row">
	<div class="col-md-12">
		<div class="card">		
		@if($toko != null)
            <div class="card-header bg-light text-center">
                <h3 class="card-title">My Toko<h3>
                <p class="card-category">ID Toko : {{ $toko->id_toko }}<p>
            </div>
            <div class="card-body">
				<div class="row">
                    <h5 class="card-title">Nama Toko</h5>
                    <div class="col-md-4">
                        <img src="{{ $penjual->foto }}"  class = "img-thumbnail img-fluid">
                    </div>
                    <div class="col-md-8">
						             
                                <h5 class="card-title">Nama Toko</h5>
                                <p>: {{$toko->nama_toko}}</p>
                            <hr>
                                <h5 class="card-title">Alamat Toko</h5>
                                <p>: {{ $toko->alamat_toko}}</p>
                            <hr>
                            	<h5 class="card-title">No Hp / Whatsapps Toko</h5>
                                <p>: {{$toko->no_hp_toko}}</p>
                            <hr>
                                <h5 class="card-title">Sosmed</h5>
                                <p>: {{$toko->sosmed}}</p>
                            <hr>   
                    </div>
                </div>
                  <hr>
					<div class="row justify-content-center">
						<div class="col-sm-2">
					  <a class="btn btn-secondary" href="{{ route('edit.toko') }}">Edit Toko </a>
						</div>
					</div>
        		@else
            		<div class="row justify-content-center">
                		<p>Tidak ada data...., </p> 
                		<a class="" href="{{ route('buka.toko') }}">Buka Toko </a>
            		</div>
        		@endif 
			</div>         
		</div>
	</div>
</div>-->
@endsection