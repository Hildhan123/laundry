@extends('layouts.main')
@section('title','Pesan Paket')

@section('search')
                                <li>
                                    <form action="">
                                        <input type="text" class="form-control-lg btn-round" id="q" name="q" placeholder="Ketik nama wilayahmu"></input>
                                </li>
                                <li>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block btn-round" id="q">Cari</button>
                                </li>
                                    </form>
@endsection

@section('content')
<div class="row">
  <div class="col-md-9">
    <div class="row">
   
    @foreach($paket as $p)
        <div class="col-md-4 text-center col-sm-6 col-xs-6">
            <div class="card" style="">
            @if(file_exists('image/galeri/'.$p->id_user.'/1.jpg'))
            <img class="card-img-top" src="/image/galeri/{{$p->id_user}}/1.jpg" alt="">
            @else
            <img class="card-img-top" src="/images/pesan.jpg" alt="">
            @endif
                <div class="card-body">
                  <h5 class="card-title text-uppercase">{{ $p->nama_paket }}</h5>
                  <p class="card-category" style="font-size: 12px;"> ID Paket : {{ $p->id_paket }} </p>
                </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $p->alamat_toko }}
                    <p class="card-category" style="font-size: 12px;"> Alamat </p>
                    </li>
                   
                    <li class="list-group-item text-success">Rp. {{ $p->harga_per_kiloan }} / kg
                    <p class="card-category" style="font-size: 12px;"> Harga</p>
                    </li>
                    
                    <li class="list-group-item text-danger">{{ $p->opsi_antar }}
                    <p class="card-category" style="font-size: 12px;"> Opsi Antar </p>
                    </li>

                    <li class="list-group-item">{{ $p->nama_toko }}
                    <p class="card-category" style="font-size: 12px;"> Nama Toko Laundry </p>
                    </li>
                    
                  </ul>
                <div class="card-body auto">
                  <a href="{{ url('/pesan/'.$p->id_paket.'/buat-pesanan') }}" class="btn btn-success">Buat Pesanan</a> 
                  <a href="{{ url('/pesan/'.$p->id_paket) }}" class="btn btn-info">Detail</a>
                </div>
            </div>
        </div>
      @endforeach
    </div>
    <center> {{ $paket->links() }} </center>
  </div>
  <div class="col-md-3">
<div class="card" style="">
  <div class="card-header">
    <h4 class="card-title"><b>Filter Pencarian</b></h4>
  </div>
  <div class="card-body">

    <form action="">
    <input type="text" class="form-control" id="p" name="p" placeholder="Cari Paket..."></input>
    <br>
    <input type="text" class="form-control" id="q" name="q" placeholder="Cari Alamat..."></input>
      <br>
      
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="data">Data per halaman</label>
        </div>
          <select class="custom-select" id="data" name="data">
            <option selected value="12">12</option>
            <option value="24">24</option>
            <option value="36">36</option>
            <option value="48">48</option>
            <option value="99">100</option>
          </select>
          <p class="text-secondary">*Jumlah Paket Terdaftar : {{ $paket->total() }}</p>
      </div>
      
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="harga" name="harga">Maks Harga</label>
        </div>
          <select class="custom-select" id="harga" name="harga">
            <option selected value="100000">Rp 100000 / kg</option>
            <option value="5000">Rp 5000 / Kg</option>
            <option value="7000">Rp 7000 / Kg</option>
            <option value="10000">Rp 10000 / kg</option>
            <option value="15000">Rp 15000 / kg</option>
            <option value="20000">Rp 20000 / kg</option>
          </select>
          <p class="text-secondary">*Harga Per Kilo</p>
      </div>

      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="opsi_antar" name="opsi_antar">Opsi Antar</label>
        </div>
          <select class="custom-select" id="opsi_antar" name="opsi_antar">
            <option selected value="">Datang Sendiri / Pesan Antar</option>
            <option value="Datang Sendiri">Datang Sendiri</option>
            <option value="Pesan Antar">Pesan Antar</option>
          </select>
          <p class="text-secondary"></p>
      </div>

      <button type="submit" class="btn btn-primary col">Filter</button>
    </form>

  </div>
</div>
  </div>
</div>

@endsection