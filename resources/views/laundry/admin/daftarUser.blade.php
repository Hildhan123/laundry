@extends('layouts.dashboard')
@extends('laundry.admin.layout.navbar')
@section('title','Daftar User')
@section('menuuser','active')

@section('content')
<h3>Daftar User</h3>
								<div class="card">
                                    <div class="card-body">
									<div class="table-responsive">
										<table class="table table-head-bg-default table-striped table-hover">
											<thead>
												<tr>
                                                    <th scope="col">No</th>
													<th scope="col">ID User</th>
													<th scope="col">Nama</th>
													<th scope="col">Email</th>
                                                    <th scope="col">Peran</th>
                                                    <th scope="col">Perubahan Terakhir</th>
                                                    <th scope="col">Opsi</th>
												</tr>
											</thead>
											<tbody>
                                            @php $no = 1 @endphp
											@foreach($user as $u)
												<tr>
                                                    <td>{{ $no++ }}</td>
													<td>{{ $u->id }}</td>
                                            		<td>{{ $u->name }}</td>
                                            		<td>{{ $u->email }}</td>
                                                    <td>{{ $u->peran }}</td>
                                            		<td>{{ $u->updated_at }}</td>
                                                    <td>
                                                        <a href="{{ url('/admin/user/edit/'.$u->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                                        <a href="{{ url('/admin/user/delete/'.$u->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');">Delete</a>
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
													 {{ $user->links() }}
												</div>
            								</div>
											</tbody>
										</table>
									</div>
									</div>
								</div>
@endsection