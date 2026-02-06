@extends('layouts.dashboard')
@extends('laundry.penjual.layouts.navbar')
@section('title','Tambah Galeri')

@section('content')
<div class="card-body">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title text-center">Tambah Galeri</h3>
        <div class="row justify-content-md-center">
          <div class="col-lg-6">
            <form action="{{ route('buat.galeri.proses') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto[]" required multiple>
                
                  @error('foto')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <p class="text-secondary">Maks 5 File dan harus .jpg!</p>
            </div>
            <input type="hidden" id="id_toko" name="id_toko" value="{{ $toko->id_toko }}">
		          @error('id_toko')
            <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary mb-2">Tambah Foto</button>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
			
									
@endsection