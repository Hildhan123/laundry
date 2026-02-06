@extends('layouts.dashboard')
@extends('laundry.admin.layout.navbar')
@section('title','Edit Akun')
@section('menuuserbuat','active')

@section('content')
<div class="card-body">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title text-center">Edit Akun</h3>
        <div class="row justify-content-md-center">
          <div class="col-lg-6">
            <form action="{{ route('user.buat.proses') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="id">ID</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror"
                id="id" name="id" value="{{ $user->id }}" readonly>
                @error('id')
              <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
              <label for="name">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                id="name" name="name" value="{{ $user->name }}">
                @error('name')
              <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
              <label for="email">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror"
                id="email" name="email" value="{{ $user->email }}">
                  @error('email')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
            </div>

            <div class="form-group">
              <label for="peran">Peran</label>
                    <input type="peran" id="peran" name="peran" class="form-control @error('peran') is-invalid @enderror" value="{{$user->peran}}" readonly>
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
                <button type="submit" class="btn btn-primary mb-2">Edit Akun</button>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection