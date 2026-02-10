@extends('layouts.dashboard')
@extends('laundry.admin.layout.navbar')
@section('title','Daftar Toko')
@section('menutoko','active')

@section('content')
<h3>Daftar Toko</h3>
								<div class="card">
                                    <div class="card-body">
									<div class="table-responsive">
										<table class="table table-head-bg-info table-striped table-hover">
											<thead>
												<tr>
                                                    <th scope="col">No</th>
													<th scope="col">ID Toko</th>
													<th scope="col">Nama Toko</th>
													<th scope="col">Alamat Toko</th>
                                                    <th scope="col">Sosmed</th>
                                                    <th scope="col">ID Penjual</th>
                                                    <th scope="col">Nama Penjual</th>
                                                    <th scope="col">Perubahan Terakhir</th>
                                                    <th scope="col">Opsi</th>
												</tr>
											</thead>
											<tbody>
                                            @php $no = 1 @endphp
											@foreach($toko as $t)
												<tr>
                                                    <td>{{ $no++ }}</td>
													<td>{{ $t->id_toko }}</td>
                                            		<td>{{ $t->nama_toko }}</td>
                                            		<td>{{ $t->alamat_toko }}</td>
                                                    <td>{{ $t->sosmed }}</td>
                                                    <td>{{ $t->id_penjual}}</td>
                                                    <td>{{ $t->nama_penjual }}</td>
                                            		<td>{{ $t->updated_at }}</td>
                                                    <td>
                                                        <a href="{{ url('/admin/toko/delete/'.$t->id_toko) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');">Delete</a>
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
													 {{ $toko->links() }}
												</div>
            								</div>
											</tbody>
										</table>
									</div>
									</div>
								</div>
@endsection