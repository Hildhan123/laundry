@extends('layouts.dashboard')
@section('title','Admin - Dashboard')

@section('content')
@if(session()->has('pesan'))
      <div class="alert alert-success">
	  {{session()->get('pesan')}}
      </div>
@endif
                        <div class="row">
							<div class="col-md-3">
								<div class="card card-stats card-warning">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-users"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Jumlah Pengunjung</p>
													<h4 class="card-title">1,294</h4>
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
													<i class="la la-bar-chart"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Total User Penjual</p>
													<h4 class="card-title">23</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
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
													<p class="card-category">Total User Pembeli</p>
													<h4 class="card-title">100</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
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
													<p class="card-category">Total Order</p>
													<h4 class="card-title">576</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
                            </div>
                        
                        
                            <div class="col-md-6">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Daftar Penjual Terdaftar</h4>
										<p class="card-category"></p>
									</div>
									<div class="card-body">
										<table class="table table-head-bg-success table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">ID</th>
													<th scope="col">Nama</th>
													<th scope="col">Email</th>
													<th scope="col">Asal Kota</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Mark</td>
													<td>Otto</td>
													<td>@mdo</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
													<td>Thornton</td>
													<td>@fat</td>
												</tr>
												<tr>
													<td>3</td>
													<td colspan="2">Larry the Bird</td>
													<td>@twitter</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
                            </div>

                            <div class="col-md-6">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Daftar Pembeli Terdaftar</h4>
										<p class="card-category"></p>
									</div>
									<div class="card-body">
										<table class="table table-head-bg-danger table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">ID</th>
													<th scope="col">Nama</th>
													<th scope="col">Email</th>
													<th scope="col">Asal Kota</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Mark</td>
													<td>Otto</td>
													<td>@mdo</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
													<td>Thornton</td>
													<td>@fat</td>
												</tr>
												<tr>
													<td>3</td>
													<td colspan="2">Larry the Bird</td>
													<td>@twitter</td>
												</tr>
											</tbody>
										</table>
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
										<table class="table table-head-bg-primary table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">ID</th>
													<th scope="col">Nama</th>
													<th scope="col">Email</th>
													<th scope="col">Asal Kota</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Mark</td>
													<td>Otto</td>
													<td>@mdo</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
													<td>Thornton</td>
													<td>@fat</td>
												</tr>
												<tr>
													<td>3</td>
													<td colspan="2">Larry the Bird</td>
													<td>@twitter</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
                            </div>

                        </div>
   

@endsection
