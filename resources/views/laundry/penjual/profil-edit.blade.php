@extends('layouts.dashboard')
@extends('laundry.penjual.layouts.navbar')
@section('title','Edit Profil')

@section('content')
<div class="card-body">
                                        <div class="card">
									        <div class="card-header ">
                                            <h3 class="card-title text-center">Edit Profil</h3>

											<div class="row justify-content-md-center">
<div class="col-lg-6">
      <form action="{{ route('penjual.edit.profil.proses') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="nama_penjual">Nama Lengkap</label>
          <input type="text"
          class="form-control @error('nama_penjual') is-invalid @enderror"
          id="nama_penjual" name="nama_penjual" value="{{ $penjual->nama_penjual }}">
          @error('nama_penjual')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="no_hp_penjual">Nomor Hp / Whatsapp</label>
          <input type="text"
          class="form-control @error('no_hp_penjual') is-invalid @enderror"
          id="no_hp_penjual" name="no_hp_penjual" value="{{ $penjual->no_hp_penjual }}">
          @error('no_hp_penjual')
            <div class="text-danger">{{ $message }}</div>
          @enderror
          <p class="text-secondary">*Cth: 012345678</p>
        </div>

        <div class="form-group">
          <label for="alamat_penjual">Alamat</label>
          <textarea type="text"
          class="form-control @error('alamat_penjual') is-invalid @enderror text-area"
          id="alamat_penjual" name="alamat_penjual" value="{{ $penjual->alamat_penjual }}"></textarea>
          @error('alamat_penjual')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" class="form-control-file" id="foto" name="foto" value="{{ old('foto') }}">
        @error('foto')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
<input type="hidden" id="id_user" name="id_user" value="{{ Auth::user()->id }}">
		@error('id_user')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary mb-2">Edit Profil</button>
      </form>

    </div>
  </div>
</div>
                                            </div>
                                        </div>
@endsection