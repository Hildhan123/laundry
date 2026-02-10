@extends('layouts.dashboard')
@extends('laundry.admin.layout.navbar')
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
                                    <th>ID Order</th>
                                    <th>ID Paket</th>
                                    <th>Nama Paket</th>
                                    <th>Nama Pembeli</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
                                    <th>Perubahan Terakhir</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
							@foreach($riwayat as $r)                           
                                        <tr>
                                            <td>{{ $r->id_order }}</td>
                                            <td>{{ $r->id_paket }}</td>
                                            <td>{{ $r->nama_paket }}</td>
                                            <td>{{ $r->nama_pembeli }}</td>
                                            <td>{{ $r->total_bayar }}</td>
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
                                            <td>{{ $r->updated_at }}</td>
                                            <td>
                                                <a href="{{ url('/admin/riwayat/delete/'.$r->id_order) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');">Delete</a>
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
							 {{ $riwayat->links() }}
								</div>
            				</div>
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
@endsection