<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>@yield('title','DASHBOARD')</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{ asset('css/ready.css') }}">
	<link rel="stylesheet" href="{{ asset('css/demo.css') }}">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="/dashboard" class="logo">
					DASHBOARD PANEL
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="@yield('foto')" alt="user-img" width="36" class="img-circle"><span >{{ Auth::user()->name }}</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="@yield('foto')" alt="user"></div>
										<div class="u-text">
											<h4> {{ Auth::user()->name }}</h4>
										</div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="
									@if(Auth::user()->peran == 'admin') {{ route('admin.profil') }} 
									@elseif(Auth::user()->peran =='penjual') {{ route('penjual.profil') }}
									@elseif(Auth::user()->peran =='pembeli') {{ route('pembeli.profil') }}
									@endif"><i class="ti-user"></i> My Profile</a>
									<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="
									@if(Auth::user()->peran == 'admin') {{ route('admin.edit.profil') }} 
									@elseif(Auth::user()->peran =='penjual') {{ route('penjual.edit.profil') }}
									@elseif(Auth::user()->peran =='pembeli') {{ route('pembeli.edit.profil') }}
									@endif"><i class="ti-settings"></i> Edit Profile</a>
									<div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></a>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="@yield('foto')">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
                                {{ Auth::user()->name }}
									<span class="user-level">
                                    @if( Auth::user()->peran == 'admin' )
                                    <div>ADMIN</div>

                                    @elseif( Auth::user()->peran  == 'penjual')
                                    <div>Jasa Laundry</div>

                                    @elseif( Auth::user()->peran == 'pembeli')
                                    <div>Pembeli</div>

                                    @endif
                                    
                                    </span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="
										@if(Auth::user()->peran == 'admin') {{ route('admin.buat.profil') }} 
										@elseif(Auth::user()->peran =='penjual') {{ route('penjual.buat.profil') }}
										@elseif(Auth::user()->peran =='pembeli') {{ route('pembeli.buat.profil') }}
										@endif">
											<span class="link-collapse">Buat Profil</span>
										</a>
									</li>
									<li>
										<a href="
										@if(Auth::user()->peran == 'admin') {{ route('admin.edit.profil') }}
										@elseif(Auth::user()->peran =='penjual') {{ route('penjual.edit.profil') }}
										@elseif(Auth::user()->peran =='pembeli') {{ route('pembeli.edit.profil') }}
										@endif">
											<span class="link-collapse">Perbarui Profil</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item @yield('menudashboard')">
							<a href="{{ route('adminDB') }}">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
								<span class="badge badge-count"></span>
							</a>
						</li>
						<!--<li class="nav-item">
							<a href="notifications.html">
								<i class="la la-bell"></i>
								<p>Notifications</p>
								<span class="badge badge-success">3</span>
							</a>
						</li>
						<hr>-->
						@yield('navbar')
											
					</ul>
				</div>
			</div>
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						

					@if(session()->has('pesan'))
        				<div class="alert alert-success la la-thumbs-up"> {{session()->get('pesan')}} </div>
					@elseif(session()->has('pesan1'))
        				<div class="alert alert-danger la la-ban"> {{session()->get('pesan1')}} </div>
						@elseif(session()->has('pesan2'))
        				<div class="alert alert-warning la la-exclamation"> {{session()->get('pesan2')}} </div>
					@endif
					
                        @yield('content')
                        
						
					</div>
				</div>
				<footer class="footer">
					<div class="container-fluid">
						<nav class="pull-left">
							<ul class="nav">
								<li class="nav-item">
									<a class="nav-link" href="/">
										Home
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="/bantuan">
										Bantuan
									</a>
								</li>
							</ul>
						</nav>
						<div class="copyright ml-auto">
							Copyright 2021 <i class="la la-heart heart text-danger"></i>Powered by <a href="/">Tim PKM Universitas Negeri Malang</a>
						</div>				
					</div>
				</footer>
			</div>
		</div>
	</div>
	<!-- Modal -->
	
</body>
<script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/core/popper.min.js') }}"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/ready.min.js') }}"></script>
<script src="{{ asset('js/demo.js') }}"></script>
<!--<script src="{{ asset('js/plugin/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
<script src="{{ asset('js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('js/plugin/datatables/datatables.min.js') }}"></script>-->
</html>