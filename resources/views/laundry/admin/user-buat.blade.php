@extends('layouts.dashboard')
@extends('laundry.admin.layout.navbar')
@section('title','Buat Akun')
@section('menuuserbuat','active')

@section('content')
<div class="card-body">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title text-center">Buat Akun</h3>
        <div class="row justify-content-md-center">
          <div class="col-lg-6">
            <form action="{{ route('user.buat.proses') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                id="name" name="name" value="{{ old('name') }}">
                @error('name')
              <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
              <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                id="email" name="email" value="{{ old('email') }}">
                  @error('email')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
            </div>

            <div class="form-group">
              <label for="peran">Peran</label>
                            <select class="form-control" name="peran" id="peran">
                                <option value="pembeli"
                                    {{ old('peran')=='pembeli' ? 'selected': '' }} >
                                    Guest / Pembeli
                                </option>
                                <option value="penjual"
                                    {{ old('peran')=='penjual' ? 'selected': '' }} >
                                    Toko Jasa Laundry / Penjual
                                </option>
                                <option value="admin"
                                    {{ old('peran')=='admin' ? 'selected': '' }} >
                                    Admin
                                </option>
                            </select>
                  @error('peran')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
            </div>
                <button type="submit" class="btn btn-primary mb-2">Buat Akun</button>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection