@extends('layouts.dashboard')
@extends('laundry.penjual.layouts.navbar')
@section('title','Edit Status Riwayat')
@section('menuriwayat','active')

@section('content')

  <div class="card">
    <div class="card-header ">
      <h3 class="card-title text-center">Edit Status Order</h3>
        <div class="row justify-content-md-center">
          <div class="col-lg-6">
            <form action="{{ route('penjual.riwayat.order.edit.proses') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="id_order">ID Order</label>
                <input type="text" class="form-control @error('id_order') is-invalid @enderror"
                id="id_order" name="id_order" value="{{ $riwayat->id_order }}" readonly>
                @error('id_order')
              <div class="text-danger">{{ $message }}</div>
                @enderror
                <p class="text-secondary"></p>
            </div>
            
            <div class="form-group">
              <label for="nama_paket">Nama Paket</label>
                <input type="text" class="form-control @error('nama_paket') is-invalid @enderror"
                id="nama_paket" name="nama_paket" value="{{ $riwayat->nama_paket }}" readonly>
                @error('nama_paket')
              <div class="text-danger">{{ $message }}</div>
                @enderror
                <p class="text-secondary"></p>
            </div>
                
            <div class="form-group">
              <label for="id_paket">ID Paket</label>
                <input type="text" class="form-control @error('id_paket') is-invalid @enderror"
                id="id_paket" name="id_paket" value="{{ $riwayat->id_paket }}" readonly>
                  @error('id_paket')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <p class="text-secondary"></p>
            </div>

            <div class="form-group">
              <label for="nama_pembeli">Nama Pembeli</label>
                <input type="text" class="form-control @error('nama_pembeli') is-invalid @enderror"
                 id="nama_pembeli" name="nama_pembeli" value="{{ $pembeli->nama_pembeli }}" readonly>
                  @error('nama_pembeli')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
            </div>

            <div class="form-group">
              <label for="id_pembeli">ID Pembeli</label>
                <input type="text" class="form-control @error('id_pembeli') is-invalid @enderror"
                 id="id_pembeli" name="id_pembeli" value="{{ $pembeli->id_pembeli }}" readonly>
                  @error('id_pembeli')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
            </div>

            <div class="form-group">
                    <label for="total_bayar">Total Bayar</label>
                <input type="text" class="form-control @error('total_bayar') is-invalid @enderror"
                 id="total_bayar" name="total_bayar" value="{{ $riwayat->total_bayar }}"readonly>
                  @error('total_bayar')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <p class="text-secondary"></p>
            </div>

            <div class="form-group">
              <label for="opsi_antar">Opsi Antar</label>
                <input type="text" class="form-control @error('opsi_antar') is-invalid @enderror"
                 id="opsi_antar" name="opsi_antar" value="{{ $paket->opsi_antar }}" readonly>
                  @error('opsi_antar')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <p class="text-secondary"></p>
            </div>
            
            <div class="form-group">
              <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Belum Bayar"
                                    {{ old('status')=='Belum Bayar' ? 'selected': '' }} >
                                    Belum Bayar
                                </option>
                                <option value="Lunas"
                                    {{ old('status')=='Lunas' ? 'selected': '' }} >
                                    Lunas
                                </option>
                                <option value="Cancel"
                                    {{ old('status')=='Cancel' ? 'selected': '' }} >
                                    Cancel
                                </option>
                            </select>
                  @error('status')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
            </div>

                <button type="submit" class="btn btn-primary mb-2">Edit Status</button>
            </form>
          
        </div>
    </div>
  </div>
@endsection