@section('foto')
		@if($penjual == null)/img/profile.jpg
		@else {{ $penjual->foto }}
		@endif
@endsection

@section('navbar')
						<li class="nav-item @yield('menutoko')">
							<a href="{{ Route('my.toko') }}">
								<i class="la la-archive"></i>
								<p>My Toko</p>
								<span class="badge badge-default"></span>
							</a>
						</li>
						<hr>
						<li class="nav-item @yield('menuriwayat')">
							<a href="{{ Route('penjual.riwayat.order') }}">
								<i class="la la-shopping-cart"></i>
								<p>Laporan Transaksi</p>
								<span class="badge badge-default"></span>
							</a>
						</li>
@endsection