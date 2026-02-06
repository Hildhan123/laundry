@section('foto')
		@if($pembeli == null)/img/profile.jpg
		@else {{ $pembeli->foto }}
		@endif
@endsection

@section('navbar')
						<li class="nav-item @yield('menupesanan')">
							<a href="{{ Route('pesan-paket') }}">
								<i class="la la-inbox"></i>
								<p>Pesan</p>
								<span class="badge badge-default"></span>
							</a>
						</li>
						<hr>
						<li class="nav-item @yield('menuriwayat')">
							<a href="{{ Route('pembeli.riwayat.order') }}">
								<i class="la la-shopping-cart"></i>
								<p>Laporan Transaksi</p>
								<span class="badge badge-default"></span>
							</a>
						</li>
@endsection