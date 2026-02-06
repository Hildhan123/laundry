@extends('layouts.dashboard')
@extends('laundry.admin.layout.navbar')
@section('title','Daftar Paket')
@section('menupaket','active')

@section('content')
<h3>Daftar Paket</h3>
								<div class="card">
                                    <div class="card-body">
									<div class="table-responsive">
										<table class="table table-head-bg-warning table-striped table-hover">
											<thead>
												<tr>
                                                    <th scope="col">No</th>
													<th scope="col">ID Paket</th>
													<th scope="col">Nama Paket</th>
													<th scope="col">Deskripsi Paket</th>
                                                    <th scope="col">Harga Per Kiloan</th>
                                                    <th scope="col">Opsi Antar</th>
                                                    <th scope="col">ID Toko</th>
                                                    <th scope="col">Nama Toko</th>
                                                    <th scope="col">Perubahan Terakhir</th>
                                                    <th scope="col">Opsi</th>
												</tr>
											</thead>
											<tbody>
                                            @php $no = 1 @endphp
											@foreach($paket as $p)
												<tr>
                                                    <td>{{ $no++ }}</td>
													<td>{{ $p->id_paket }}</td>
                                            		<td>{{ $p->nama_paket }}</td>
                                            		<td>{{ $p->deskripsi_paket }}</td>
                                                    <td>{{ $p->harga_per_kiloan }}</td>
                                                    <td>{{ $p->opsi_antar}}</td>
                                                    <td>{{ $p->id_toko }}</td>
                                                    <td>{{ $p->nama_toko }}</td>
                                            		<td>{{ $p->updated_at }}</td>
                                                    <td>
                                                        <a href="{{ url('/admin/paket/delete/'.$p->id_paket) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');">Delete</a>
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
													 {{ $paket->links() }}
												</div>
            								</div>
											</tbody>
										</table>
									</div>
									</div>
								</div>
@endsection