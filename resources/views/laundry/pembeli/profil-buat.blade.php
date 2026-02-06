@extends('layouts.dashboard')
@extends('laundry.pembeli.layouts.navbar')
@section('title','Buat Profil')

@section('content')
<div class="card-body">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title text-center">Buat Profil</h3>
        <div class="row justify-content-md-center">
          <div class="col-lg-6">
            <form action="{{ route('pembeli.buat.profil.proses') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="nama_pembeli">Nama Lengkap</label>
                <input type="text" class="form-control @error('nama_pembeli') is-invalid @enderror"
                id="nama_pembeli" name="nama_pembeli" value="{{ old('nama_pembeli') }}">
                @error('nama_pembeli')
              <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
              <label for="no_hp_pembeli">Nomor Hp / Whatsapp</label>
                <input type="text" class="form-control @error('no_hp_pembeli') is-invalid @enderror"
                id="no_hp_pembeli" name="no_hp_pembeli" value="{{ old('no_hp_pembeli') }}">
                  @error('no_hp_pembeli')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
            </div>

            <div class="form-group">
              <label for="alamat_pembeli">Alamat</label>
                <textarea type="text" class="form-control @error('alamat_pembeli') is-invalid @enderror text-area"
                id="alamat_pembeli" name="alamat_pembeli" value="{{ old('alamat_pembeli') }}"></textarea>
                  @error('alamat_pembeli')
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
                <button type="submit" class="btn btn-primary mb-2">Buat Profil</button>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
			
									
@endsection