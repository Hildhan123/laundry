@extends('layouts.dashboard')
@extends('laundry.pembeli.layouts.navbar')
@section('title','Buat Pesanan')
@section('menupesanan','active')

@section('content')
<div class="card-body">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title text-center">Buat Pesanan</h3>
        <div class="row justify-content-md-center">
          <div class="col-lg-6">
            <form action="{{ route('proses-pesanan') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="nama_paket">Nama Paket</label>
                <input type="text" class="form-control @error('nama_paket') is-invalid @enderror"
                id="nama_paket" name="nama_paket" value="{{ $paket->nama_paket }}" readonly>
                @error('nama_paket')
              <div class="text-danger">{{ $message }}</div>
                @enderror
                <p class="text-secondary"></p>
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
              <label for="nama_pembeli">Nama Pembeli</label>
                <input type="text" class="form-control @error('nama_pembeli') is-invalid @enderror"
                 id="nama_pembeli" name="nama_pembeli" value="{{ $pembeli->nama_pembeli }}" readonly>
                  @error('nama_pembeli')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <label for="kilo">Berat</label>
                <input type="number" onkeyup="total()" class="form-control" id="kilo" name="kilo" step=".01">
                <p class="text-secondary">*Isi dalam satuan Kilogram</p>
                    </div>
                    <div class="col">
                    <label for="total_bayar">Total Bayar</label>
                <input type="text" class="form-control @error('total_bayar') is-invalid @enderror"
                 id="total_bayar" name="total_bayar" readonly>
                  @error('total_bayar')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <p class="text-secondary">Harga per kiloan : Rp {{ $paket->harga_per_kiloan }} / Kg</p>
                    </div>
                </div>
            </div>

            <div class="form-group">
              <label for="opsi_antar">Opsi Antar</label>
                <input type="text" class="form-control @error('opsi_antar') is-invalid @enderror"
                 id="opsi_antar" name="opsi_antar" value="{{ $paket->opsi_antar }}" readonly>
                  @error('opsi_antar')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <p class="text-secondary">*Sebagai catatan layanan pesan antar diatur oleh penjual, silahkan hubungi lebih lanjut</p>
            </div>
            

            <input type="hidden" id="id_pembeli" name="id_pembeli" value="{{ $pembeli->id_pembeli }}">
            <input type="hidden" id="status" name="status" value="Belum Bayar">

                <button type="submit" class="btn btn-primary mb-2">Buat Pesanan</button>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
			
<script type="text/javascript">

    function total() {
      var quantity = parseFloat(document.getElementById('kilo').value);

      var price = <?php echo $paket->harga_per_kiloan ?>;

      var total = price * quantity;

      document.getElementById('total_bayar').value = total;
    }

</script>


@endsection