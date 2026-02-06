@extends('layouts.dashboard')
@extends('laundry.pembeli.layouts.navbar')
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
                                    <th>Dibuat Pada</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                            $no = 1;
                            @endphp
							@forelse($riwayat as $r)                           
                                        <tr>
                                            <td>{{ $r->id_order }}</td>
                                            <td>{{ $r->id_paket }}</td>
                                            <td>{{ $r->nama_paket }}</td>
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
                                                <a href="https://api.whatsapp.com/send?phone=62{{$r->no_hp_toko}}&text=Assalamualaikum%20Saya%20{{$r->nama_pembeli}}%20ingin%20membeli%20salah%20satu%20paket%20anda%20yang%20bernama%20({{$r->nama_paket}})%20Dengan%20ID%20Order%20{{$r->id_order}}%20Terimakasih"                                                
                                                 class="btn btn-success btn-sm">Hubungi Penjual</a>
                                                @if($r->status == 'Belum Bayar')
                                                <a href="{{ url('/pembeli/riwayat/cancel/'.$r->id_order) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');">Cancel</a>
                                                @endif
                                            </td>
                                        </tr>
                            @empty
                                <td colspan="8" class="text-center">Tidak ada data...</td>
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