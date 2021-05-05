@extends('layouts.dashboard')
@section('title','Daftar Pembeli')

@section('content')
<h1>Daftar Pembeli</h1>
                                    <div class="card-body">
										<table class="table table-head-bg-danger table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">ID</th>
													<th scope="col">Nama</th>
													<th scope="col">Email</th>
													<th scope="col">No_Hp</th>
                                                    <th scope="col">Alamat</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Mark</td>
													<td>Otto</td>
													<td>@mdo</td>
                                                    <td>@mdo</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
													<td>Thornton</td>
													<td>@fat</td>
                                                    <td>@mdo</td>
												</tr>
												<tr>
													<td>3</td>
													<td colspan="2">Larry the Bird</td>
													<td>@twitter</td>
                                                    <td>@mdo</td>
                                                    
												</tr>
											</tbody>
										</table>
									</div>
@endsection