@extends('layouts.dashboard')
@extends('laundry.penjual.layouts.navbar')
@section('title','Riwayat Order')
@section('menuriwayat','active')

@section('content')
<h3>Riwayat Order</h3>
			<div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover table-head-bg-primary">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">ID Order</th>
                                    <th scope="col">ID Paket</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">ID Pembeli</th>	
									<th scope="col">Nama Pembeli</th>
									<th scope="col">Total Bayar</th>
									<th scope="col">Dibuat Pada</th>
									<th scope="col">Status</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                            $no = 1;
                            @endphp
							@forelse($riwayat as $r)                           
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $r->id_order }}</td>
                                            <td>{{ $r->id_paket }}</td>
                                            <td>{{ $r->nama_paket }}</td>
                                            <td>{{ $r->id_pembeli }}</td>
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
                                            <td>
                                                <a href="{{ url('/penjual/riwayat/edit/'.$r->id_order) }}" class="btn btn-secondary btn-sm">Edit Status</a>
                                            </td>
                                        </tr>
                            @empty
                                    <td colspan="10" class="text-center">Tidak ada data...</td>
							@endforelse
							
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
							 {{ $riwayat->links() }}
								</div>
            				</div>
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
@endsection