<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;
use File;
use App\Models\Riwayat;
use App\Models\Penjual;
use App\Models\Pembeli;
use App\Models\Paket;
use App\Models\Toko;
use App\Models\Galeri;
use App\Http\Requests\Validator;

class UmumController extends Controller
{
    public function landingPage(){
        return redirect()->route('pesan-paket');
    }

    public function pesanPaket(Request $request){
        

        $data = $request->input('data');
        $dataH = $request->input('harga');
        $opsi = $request->input('opsi_antar');
        $page = 12;
        $harga = 100000;
        $searchAlamat = $request->input('q');
        $searchPaket = $request->input('p');
        
        if($data != "")
        {
            $page = $request->input('data');
        }

        if($dataH != "")
        {
            $harga = $request->input('harga');
        }

        $paket = Penjual::join('tokos','tokos.id_penjual', '=', 'penjuals.id_penjual')
        ->join('pakets','pakets.id_toko', '=', 'tokos.id_toko')
        ->where(function ($query) use ($harga, $opsi,$searchAlamat, $searchPaket){
            $query->whereBetween('pakets.harga_per_kiloan', [0 , $harga])
                ->where('pakets.opsi_antar', 'like', '%'.$opsi.'%')
                ->where('tokos.alamat_toko', 'like', '%'.$searchAlamat.'%')
                ->where('pakets.nama_paket', 'like', '%'.$searchPaket.'%');
                //->orwhere('tokos.nama_toko', 'like', '%'.$search.'%');
        })
        ->paginate($page);

        //$paket->appends(['data' => $data,'harga' => $harga, 'opsi_antar' => $opsi]);

        //$paket = Paket::paginate($page);
        
        return view('laundry.pesan',['paket' => $paket]);
    }

    public function tentangKami()
    {
        return view('laundry.tentang');
    }

    public function cariPesan(Request $request)
    {
        $search =  $request->input('q');
    }

    public function paketDetail(Paket $paket)
    {
        $toko = DB::table('tokos')->where('id_toko',$paket->id_toko)->first();
        $penjual = DB::table('penjuals')->where('id_penjual',$toko->id_penjual)->first();
        $file = collect([]); 

        if(File::exists(public_path('/image/galeri/'.$toko->id_user.'/')))
        {
        $filecari = File::files(public_path('/image/galeri/'.$toko->id_user.'/'));
        $file = collect($filecari);
        }

        $pakets = DB::table('pakets')->where('id_toko',$paket->id_toko)->get();
        //$pakets = DB::table('pakets')->get();
        return view('laundry.paket-detail',['paket' => $paket,'file' => $file, 'toko' => $toko, 'pakets' => $pakets,'penjual' => $penjual]);
    }

    public function buatPesanan(Paket $paket)
    {    
        $find = Auth::user()->id;
        $pembeli = DB::table('pembelis')->where('id_user',$find)->first();

        return view('laundry.pesanan-buat',['paket' => $paket, 'pembeli' => $pembeli]);
    }

    public function prosesPesanan(Paket $paket, Request $request, Riwayat $riwayat)
    {
        $validateData = $request->validate([
            'nama_paket'   => 'required',
            'id_paket'  => 'required',
            'id_pembeli'      => 'required',
            'total_bayar' => 'required|numeric',
            'status' => 'required',
        ]);
        
        Riwayat::create($validateData);
        $request->session()->flash('pesan', "Pesanan paket - {$validateData['nama_paket']} telah dibuat");
        return redirect()->route('pembeli.riwayat.order');
        //return dump($validateData);
    }

    public function support()
    {
        $admin = User::join('admins','admins.id_user','=','users.id')->get();

        return view('laundry.support',['admin'=>$admin]);
    }
}
