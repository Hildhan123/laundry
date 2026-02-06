<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Pembeli;
use App\Models\Riwayat;
use Auth;
use Illuminate\Support\Facades\DB;

class CobaController extends Controller
{

    public function index()
    {
        return view('laundry.user.index');
    }
    public function buatPembeli (Pembeli $pembeli)
    {
        if(Auth::user()->id == '$pembeli->user_id' )
        {
        return view('laundry.user.index');
        }
        else 
        {
        return view ('buat-pembeli');
        }
    }

    public function prosesPembeli(Request $request)
    {
        $valid = $request->validate([
            'nama_pembeli'   => '',
            'alamat_pembeli'    => '',
            'no_hp_pembeli'      => '',
            'id_user' => 'unique:pembelis,id_user',
        ]);
        Pembeli::create($valid);

        return "sukses";
    }
    public function buatPaket ()
    {
        return view ('buat-paket');
    }

    public function prosesPaket(Request $request)
    {
        $valid = $request->validate([
            'nama_paket'   => '',
            'deskripsi_paket'    => '',
            'harga_per_kiloan'      => '',
            'id_toko'   => '',
            'nama_toko'   => '',
            'opsi_antar'   => '',
        ]);
        Paket::create($valid);

        return "Sukses";
    }
    public function paketDetail(Paket $paket)
    {
        return view('paket-detail',['paket' => $paket]);
    }
    public function buatPesanan(Paket $paket)
    {
        $find = Auth::user()->id;
        $pembeli = DB::table('pembelis')->where('id_user',$find)->first();
        dump($pembeli);
        $nama = $pembeli->nama_pembeli;
        $id = $pembeli->id_pembeli;
        return view('buat-paket',['paket' => $paket,"nama" => $nama,'id' => $id]);
        
    }
    public function prosesPesanan(Request $request)
    {
        $valid = $request->validate([
            'nama_paket'   => '',
            'nama_pembeli'    => '',
            'total_bayar'   => '',
            'id_paket' => '',
            'id_pembeli'=>'',
        ]);
        Riwayat::create($valid);
    }
}
