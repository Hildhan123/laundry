@extends('layouts.dashboard')
@extends('laundry.admin.layout.navbar')
@section('title','Edit Profil')

@section('content')
                                    <div class="card-body">
                                        <div class="card">
									        <div class="card-header ">
                                            <h3 class="card-title text-center">Edit Profil</h3>

											<div class="row justify-content-md-center">
<div class="col-lg-6">
      <form action="{{ route('admin.edit.profil.proses') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="nama_admin">Nama Lengkap</label>
          <input type="text"
          class="form-control @error('nama_admin') is-invalid @enderror"
          id="nama_admin" name="nama_admin" value="{{ $admin->nama_admin }}">
          @error('nama_admin')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="no_hp_admin">Nomor Hp / Whatsapp</label>
          <input type="text"
          class="form-control @error('no_hp_admin') is-invalid @enderror"
          id="no_hp_admin" name="no_hp_admin" value="{{ $admin->no_hp_admin }}">
          @error('no_hp_admin')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" class="form-control-file" id="foto" name="foto">
        @error('foto')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
        <button type="submit" class="btn btn-primary mb-2">Edit Profil</button>
      </form>

    </div>
  </div>
</div>
                                            </div>
                                        </div>
								
									
@endsection