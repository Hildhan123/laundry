@extends('layouts.dashboard')
@extends('laundry.penjual.layouts.navbar')
@section('title','Buka Toko')

@section('content')

<div class="card-body">
  <div class="card">
    <div class="card-header ">
      <h4 class=" text-center">Buka Toko</h4>
        <div class="row justify-content-md-center">
          <div class="col-lg-6">
            <form action="{{ route('buka.toko.proses') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="nama_toko">Nama Toko</label>
                <input type="text" class="form-control @error('nama_toko') is-invalid @enderror"
                id="nama_toko" name="nama_toko" value="{{ old('nama_toko') }}">
                @error('nama_toko')
              <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
              <label for="alamat_toko">Alamat</label>
                <textarea type="text" class="form-control @error('alamat_toko') is-invalid @enderror text-area"
                id="alamat_toko" name="alamat_toko" value="{{ old('alamat_toko') }}"></textarea>
                  @error('alamat_toko')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
            </div>

            <div class="form-group">
              <label for="no_hp_toko">Nomor Hp / Whatsapp</label>
                <input type="text" class="form-control @error('no_hp_toko') is-invalid @enderror"
                id="no_hp_toko" name="no_hp_toko" value="{{ old('no_hp_toko') }}">
                  @error('no_hp_toko')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <p class="text-secondary">*Cth: 012345678</p>
            </div>

            <div class="form-group">
              <label for="sosmed">Sosial Media</label>
                <input type="text" class="form-control @error('sosmed') is-invalid @enderror"
                id="sosmed" name="sosmed" value="{{ old('sosmed') }}" placeholder="@laundrymurah">
                @error('sosmed')
              <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <input type="hidden" id="id_user" name="id_user" value="{{ Auth::user()->id }}">
		        @error('id_user')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            <input type="hidden" id="id_penjual" name="id_penjual" value="{{ $penjual->id_penjual }}">
		        @error('id_penjual')
                    <div class="text-danger">{{ $message }}</div>
                @enderror        
                <button type="submit" class="btn btn-primary mb-2">Buka Toko</button>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>

@endsection