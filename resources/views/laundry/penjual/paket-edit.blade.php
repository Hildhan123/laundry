@extends('layouts.dashboard')
@extends('laundry.penjual.layouts.navbar')
@section('title','Edit Paket')

@section('content')
<div class="card-body">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title text-center">Edit Paket - {{ $paket->nama_paket }}</h3>
        <div class="row justify-content-md-center">
          <div class="col-lg-6">
            <form action="{{ route('edit.paket.proses') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="nama_paket">Nama Paket</label>
                <input type="text" class="form-control @error('nama_paket') is-invalid @enderror"
                id="nama_paket" name="nama_paket" value="{{ $paket->nama_paket }}">
                @error('nama_paket')
              <div class="text-danger">{{ $message }}</div>
                @enderror
                <p class="text-secondary">Cth: Paket VIP</p>
            </div>

            <div class="form-group">
              <label for="id_paket">ID Paket</label>
                <input type="text" class="form-control @error('id_paket') is-invalid @enderror"
                id="id_paket" name="id_paket" value="{{ $paket->id_paket }}" readonly>
                @error('id_paket')
              <div class="text-danger">{{ $message }}</div>
                @enderror
                <p class="text-secondary"></p>
            </div>
                
            <div class="form-group">
              <label for="deskripsi_paket">Deskripsi Paket</label>
                <textarea type="text" class="form-control @error('deskripsi_paket') is-invalid @enderror text-area"
                id="deskripsi_paket" name="deskripsi_paket" value="{{ $paket->deskripsi_paket }}"></textarea>
                  @error('deskripsi_paket')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <p class="text-secondary">*boleh dikosongkan</p>
            </div>    

            <div class="form-group">
              <label for="harga_per_kiloan">Harga Per Kiloan</label>
                <input type="text" class="form-control @error('harga_per_kiloan') is-invalid @enderror"
                id="harga_per_kiloan" name="harga_per_kiloan" value="{{ $paket->harga_per_kiloan }}" placeholder="cth: 10000">
                  @error('harga_per_kiloan')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <p class="text-secondary">*Cukup ketik angkanya tanpa titik dan spasi</p>
            </div>

            <div class="form-group">
              <label for="id_toko">ID Toko</label>
                <input type="text" class="form-control @error('id_toko') is-invalid @enderror"
                 id="id_toko" name="id_toko" value="{{ $toko->id_toko }}" readonly>
                  @error('id_toko')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
            </div>

            <div class="form-group">
              <label for="nama_toko">Nama Toko</label>
                <input type="text" class="form-control @error('nama_toko') is-invalid @enderror"
                 id="nama_toko" name="nama_toko" value="{{ $toko->nama_toko }}" readonly>
                  @error('nama_toko')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
            </div>

            <div class="form-group">
                <label for="opsi_antar">Opsi Antar</label>                     
                        <select class="form-control" name="opsi_antar" id="opsi_antar">
                            <option value="Datang Sendiri"
                                {{ old('opsi_antar')=='Datang Sendiri' ? 'selected': '' }} >
                                Datang Sendiri
                            </option>
                            <option value="Pesan Antar"
                                {{ old('opsi_antar')=='Pesan Antar' ? 'selected': '' }} >
                                Pesan Antar
                            </option>
                        </select>
                            @error('opsi_antar')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <p class="text-secondary">*Jika mendukung keduanya silahkan buat paket baru lagi</p>
            </div>

                <button type="submit" class="btn btn-primary mb-2">Edit Paket</button>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
			
									
@endsection