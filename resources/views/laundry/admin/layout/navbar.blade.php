@section('foto')
		@if($admin == null)/img/profile.jpg
		@else {{$admin->foto}}
		@endif
@endsection

@section('navbar')
						<li class="nav-item @yield('menuuserbuat')">
							<a href="{{ route('user.buat') }}">
								<i class="la la-user-plus"></i>
								<p>Buat Akun Baru</p>
							</a>
						</li>
						<hr/>
						<li class="nav-item @yield('menuuser')">
							<a href="{{ route('admin.user') }}">
								<i class="la la-users"></i>
								<p>Daftar User</p>
							</a>
						</li>
						<li class="nav-item @yield('menupenjual')">
							<a href="{{ route('admin.penjual') }}">
								<i class="la la-bar-chart"></i>
								<p>Daftar Penjual</p>
							</a>
						</li>
						<li class="nav-item @yield('menutoko')">
							<a href="{{ route('admin.toko') }}">
								<i class="la la-archive"></i>
								<p>Daftar Toko</p>
							</a>
						</li>
						<li class="nav-item @yield('menupaket')">
							<a href="{{ route('admin.paket') }}">
								<i class="la la-bars"></i>
								<p>Daftar Paket</p>
							</a>
						</li>
						<li class="nav-item @yield('menupembeli')">
							<a href="{{ route('admin.pembeli') }}">
								<i class="la la-male"></i>
								<p>Daftar Pembeli</p>
							</a>
						</li>
						<li class="nav-item @yield('menuriwayat')">
							<a href="{{ route('admin.riwayat.order') }}">
								<i class="la la-list-alt"></i>
								<p>Riwayat Order</p>
							</a>
						</li>
						<!--<li class="nav-item @yield('active','active')">
							<a href="/admin">
								<i class="la la-inbox"></i>
								<p>Inbox</p>
								<span class="badge badge-default">3</span>
							</a>
						</li>-->
@endsection