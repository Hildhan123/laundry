@extends('layouts.dashboard')
@extends('laundry.admin.layout.navbar')
@section('title','Daftar Penjual / Jasa')
@section('menupenjual','active')

@section('content')
							<h3>Daftar Penjual</h3>
								<div class="card">
                                    <div class="card-body">
									<div class="table-responsive">
										<table class="table table-head-bg-success table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">No</th>
													<th scope="col">ID Penjual</th>
													<th scope="col">ID User</th>
													<th scope="col">Nama Penjual</th>
													<th scope="col">Email</th>
													<th scope="col">Nomor Hp / Whatsapp</th>
                                                    <th scope="col">Alamat</th>
													<th scope="col">Perubahan Terakhir</th>
													<th scope="col">Opsi</th>
												</tr>
											</thead>
											<tbody>
											@php $no = 1; @endphp
											@foreach($penjual as $p)
												<tr>
													<td>{{ $no++ }}</td>
													<td>{{ $p->id_penjual }}</td>
													<td>{{ $p->id_user }}</td>
                                            		<td>{{ $p->nama_penjual }}</td>
                                            		<td>{{ $p->email }}</td>
													<td>{{ $p->no_hp_penjual }}</td>
                                            		<td>{{ $p->alamat_penjual }}</td>
													<td>{{ $p->updated_at }}</td>
													<td>
                                                        <a href="{{ url('/admin/penjual/delete/'.$p->id_penjual) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');">Delete</a>
                                                    </td>
												</tr>
											@endforeach
											<div class="row">
												<div class="col-lg-6">
													<form action="">
            										@csrf
            											<div class="input-group">
                											<input type="text" class="form-control" name="q" placeholder="Cari Nama"> 
                    											<button type="submit" class="btn btn-default">Cari</button>
													</form>
														</div>
														<br>
												<div class="col-lg-2">
													 {{ $penjual->links() }}
												</div>
            								</div>
											</tbody>
										</table>
									</div>
									</div>
								</div>
@endsection