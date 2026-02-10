@extends('layouts.main')
@section('title','Detail Paket')

@section('search')
                                <li>
                                    <a href="/pesan" class="btn btn-primary btn-lg btn-block btn-round">Lihat Paket Lainnya</a>
                                </li>
                                    
@endsection

@section('content')

        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card" style="">
                    <div class="card-header bg-light">
			                <h5 class="card-title">Detail Paket</h5>
			                <p class="card-category">ID Paket : {{$paket->id_paket}}</p>
		            </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h7 class="mb-0">Nama Paket</h7>
                            </div>
                                <div class="col-sm-9">
                                    <p class="font-weight text-xl-left text-uppercase">: {{$paket->nama_paket}}</p>
                                </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h7 class="mb-0">Deskripsi Paket</h7>
                            </div>
                                <div class="col-sm-9">
                                    <p class="font-weight text-xl-left">: {{$paket->deskripsi_paket}}</p>
                                </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h7 class="mb-0 text-secondary">Harga per kiloan</h7>
                            </div>
                                <div class="col-sm-9">
                                    <p class="font-weight text-xl-left">: Rp {{$paket->harga_per_kiloan}} / Kg</p>
                                </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h7 class="mb-0 text-secondary">Opsi Antar</h7>
                            </div>
                                <div class="col-sm-9">
                                    <p class="font-weight text-xl-left">: {{$paket->opsi_antar}}</p>
                                </div>
                        </div>

                    </div>
                                   
                    </div><!--card-->
                                    <div class="text-center">
                                        <a href="{{ url('/pesan/'.$paket->id_paket.'/buat-pesanan') }}" class="btn btn-success">Buat Pesanan</a> 
                                    </div>
                                    <br>
                </div><!--col-->
                <div class="col">
                    <div class="card" style="">
                        <div class="card-header bg-light">
                            <div class="card-title"><h5>Galeri Laundry</h5></div>
                            <br>
                        </div>
                    <div class="card-body">
                        <br>
                        <br>
                        @if( count($file) != 0 )
                        @php $no=2; @endphp
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <img class="d-block w-100 img-thumbnail img-fluid" src="/image/galeri/{{$toko->id_user}}/1.jpg">
                                </div>
                                @foreach($file->skip(1) as $f)
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-thumbnail img-fluid" src="/image/galeri/{{$toko->id_user}}/{{$no++}}.jpg">
                                </div>
                                @endforeach
                            </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                        @else
                        <center>Toko ini belum menambahkan galeri foto!</center>
                        @endif
                    </div>
                    </div>
                </div>
            </div> <!-- row -->            
        </div> <!-- conteiner -->
        <div class="card">
                <div class="bg-light">
                    <div class="card-header">
			                <h5 class="card-title">{{$toko->nama_toko}}</h5>
			                <p class="card-category">ID Toko : {{$toko->id_toko}}</p>
		            </div>
                </div>
                
                    <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <p> Nama Penjual </p>
                                    </div>
                                    <div class="col">
                                        <p>: {{$penjual->nama_penjual}}</p>
                                    </div>
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <p>No Hp / Whatsapp</p>
                                    </div>
                                    <div class="col">
                                        <p>: {{$toko->no_hp_toko}}</p>
                                    </div>
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <p>Alamat</p>
                                    </div>
                                    <div class="col">
                                        <p>: {{$toko->alamat_toko}}</p>
                                    </div>
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <p>Sosmed</p>
                                    </div>
                                    <div class="col">
                                        <p>: {{$toko->sosmed}}</p>
                                    </div>
                                </div> 
                    </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">Paket lainnya dari {{$toko->nama_toko}}</div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($pakets as $paket)
                    <div class="col-xs-10 col-md-3 text-center content-center">
                    <div class="card" style="">                   
                                <div>
                                    <br>
                                    <h6 class="text-uppercase">{{$paket->nama_paket}}</h6>
                                    <p class="text-secondary" style="font-size: 16px;">Rp {{$paket->harga_per_kiloan}} / Kg </p>
                                    <p class="text-third" style="font-size: 16px;"> {{$paket->opsi_antar}} </p>
                                </div>
                                    <div>
                                        <a href="{{ url('/pesan/'.$paket->id_paket) }}" class="btn btn-info">Detail</a> 
                                    </div>
                    </div>
                    </div>
            @endforeach
                </div>
            </div>
        </div>
@endsection