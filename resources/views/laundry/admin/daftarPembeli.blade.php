@extends('layouts.dashboard')
@extends('laundry.admin.layout.navbar')
@section('title','Daftar Pembeli')
@section('menupembeli','active')

@section('content')
							<h3>Daftar Pembeli</h3>
								<div class="card">
                                    <div class="card-body">
									<div class="table-responsive">
										<table class="table table-head-bg-danger table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">No</th>
													<th scope="col">ID Pembeli</th>
													<th scope="col">ID User</th>
													<th scope="col">Nama Pembeli</th>
													<th scope="col">Email</th>
													<th scope="col">Nomor Hp / Whatsapp</th>
                                                    <th scope="col">Alamat</th>
													<th scope="col">Perubahan Terakhir</th>
													<th scope="col">Opsi</th>
												</tr>
											</thead>
											<tbody>
											@php $no = 1; @endphp
											@foreach($pembeli as $p)
												<tr>
													<td>{{ $no++ }}</td>
													<td>{{ $p->id_pembeli }}</td>
													<td>{{ $p->id_user }}</td>
                                            		<td>{{ $p->nama_pembeli }}</td>
													<td>{{ $p->email }}</td>
                                            		<td>{{ $p->no_hp_pembeli }}</td>
                                            		<td>{{ $p->alamat_pembeli }}</td>
													<td>{{ $p->updated_at }}</td>
													<td>
                                                        <a href="{{ url('/admin/pembeli/delete/'.$p->id_pembeli) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');">Delete</a>
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
													 {{ $pembeli->links() }}
												</div>
            								</div>
											</tbody>
										</table>
									</div>
								</div>
							</div>
@endsection