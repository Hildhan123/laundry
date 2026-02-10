@extends('layouts.dashboard')
@extends('laundry.penjual.layouts.navbar')
@section('title','My Toko')
@section('menutoko','active')

@section('content')
<h3>My Toko</h3>
<div class="row">
    <div class="col-md-7">
<div class="card">
        <div class="card-header ">
			<h3 class="card-title">My Toko</h3>
			<p class="card-category">ID Toko : {{ $toko->id_toko }}</p>
		</div>
			<div class="card-body">
				<div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Toko</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     : {{ $toko->nama_toko }}
                    </div>
                </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nomor Hp / Whatsapp</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      : {{ $toko->no_hp_toko }}
                    </div>
                  </div>
				            <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      : {{ $toko->alamat_toko }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Pemilik / Penjual</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      : {{ $penjual->nama_penjual }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Sosmed</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      : {{ $toko->sosmed }}
                    </div>
                  </div>
				  <br>
				  <br>
					  <a class="btn btn-secondary" href="{{ route('edit.toko') }}">Edit Toko</a>     
			    </div>
        </div>
    </div>
    <div class="col-md-5">
      <div class="card">
      <div class="card-header">
        <div class="card-title">Galeri</div>
      </div>
      <div class="card-body">
          @if( count($file) == 0 )
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100 img-thumbnail img-fluid" src="/image/carausel/1.jpg">
              </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-thumbnail img-fluid" src="/image/carausel/2.jpg">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-thumbnail img-fluid" src="/image/carausel/3.jpg">
            </div>
            </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
          </div>
          <hr>
          <a class="btn btn-primary" href="{{ route('buat.galeri') }}">Tambahkan Galeri</a>
          @else
          @php $no=2; @endphp
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100 img-thumbnail img-fluid" src="/image/galeri/{{Auth::user()->id}}/1.jpg">
              </div>
            @foreach($file->skip(1) as $f)
              <div class="carousel-item">
                <img class="d-block w-100 img-thumbnail img-fluid" src="/image/galeri/{{Auth::user()->id}}/{{$no++}}.jpg">
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
          </div>
          <hr>
          <a class="btn btn-secondary" href="{{ route('buat.galeri') }}">Edit Galeri</a>
          @endif
          </div>
      </div>
    </div>
</div>

    <a href="{{ Route('buat.paket') }}" class="text-white btn btn-primary">
        Tambahkan paket laundry
    </a>

</br>
</br>
</br>
<div class="card">
<div class="col-lg-12">
    <table class="table table-head-bg-warning">
        <thead class="thead-light bg-primary">
        <tr>
            <th scope="col">No</th>
            <th scope="col">ID Paket</th>
            <th scope="col">Nama Paket</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Harga Per Kiloan</th>
            <th scope="col">Opsi Antar</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @forelse ($paket as $p)
            <tr>
                <th scope="row">{{$no++}}</th>
                <th scope="row">{{$p->id_paket}}</th>
                <th scope="row">{{$p->nama_paket}}</th>
                <th scope="row">{{$p->deskripsi_paket}}</th>
                <th scope="row">{{$p->harga_per_kiloan}}</th>
                <th scope="row">{{$p->opsi_antar}}</th>
                <th scope="row">
                  <a href="{{ url('/penjual/mytoko/edit/'.$p->id_paket) }}" class="btn btn-secondary btn-sm mr-2">Edit</a>
                <a href="{{ url('/penjual/mytoko/delete/'.$p->id_paket) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');">Delete</a></th>
            </tr>
            @empty
            <td colspan="7" class="text-center">Tidak ada data...</td>
            @endforelse
        </tbody>
    </table>
</div>
</div>
	
@endsection