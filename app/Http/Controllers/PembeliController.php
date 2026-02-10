<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Riwayat;
use App\Models\Penjual;
use App\Models\Pembeli;
use App\Models\Paket;
use App\Models\Toko;
use App\Http\Requests\Validator;

class PembeliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('');
        $this->middleware('pembeli');
    }
//index
    public function index(Pembeli $pembeli)
    {
        $find = Auth::user()->id;
        $pembeli = DB::table('pembelis')->where('id_user',$find)->first();
        $riwayat = ([]);
        if($pembeli != null)
        {
        $riwayat = Pembeli::join('riwayats','riwayats.id_pembeli','=','pembelis.id_pembeli')
        ->where('riwayats.id_pembeli',$pembeli->id_pembeli)->get();
        }


        return view('laundry.pembeli.pembeli',['pembeli' => $pembeli,'riwayat'=>$riwayat]);
    }

//myprofil
    public function myprofil(Pembeli $pembeli)
    {
        $find = Auth::user()->id;
        $pembeli = DB::table('pembelis')->where('id_user',$find)->first();
        if($pembeli == null)
        {
            return redirect()->route('pembeli.buat.profil');
        }
        else
        {
        return view('laundry.pembeli.profil',['pembeli' => $pembeli]);
        }
    }
//buatprofil
    public function buatProfil(Request $request, Pembeli $pembeli)
    {
        $find = Auth::user()->id;
        $pembeli = DB::table('pembelis')->where('id_user',$find)->first();

        if($pembeli == null)
        {
            return view('laundry.pembeli.profil-buat',['pembeli' => $pembeli]);
        }
        else
    {
        if ($pembeli->id_user == $find)
        {
            $request->session()->flash('pesan1', "Data profil anda sudah dibuat ");
            return redirect()->route('pembeli.profil');
        }
        else 
        {
        return view('laundry.pembeli.profil-buat',['pembeli' => $pembeli]);
        }
    }
    }

//prosesbuatprofil

    public function prosesBuatProfil(Request $request)
    {
        $validateData = $request->validate([
            'nama_pembeli'   => 'required|max:50|string',
            'no_hp_pembeli'  => 'required|digits_between:2,20|numeric',
            'foto'      => 'required|max:2000|mimes:png,jpg,jpeg',
            'id_user' => 'required',
            'alamat_pembeli' => 'required|max:200'
        ]);

        $id = Auth::user()->id;
        $extFile = $request->foto->getClientOriginalExtension();
        $namaFile = "profil-{$id}".".".$extFile;
        $request->foto->move('image/pembeli',$namaFile);
        $path = "/image/pembeli/".$namaFile;
        $validateData['foto'] = $path;
        
        Pembeli::create($validateData);
        $request->session()->flash('pesan', "Buat Profil {$validateData['nama_pembeli']} Berhasil");
        return redirect()->route('pembeli.profil');

    }

//editprofil

    public function editProfil(Pembeli $pembeli)
    {
        $find = Auth::user()->id;
        $pembeli = DB::table('pembelis')->where('id_user',$find)->first();

        if($pembeli == null)
        {
            return redirect()->route('pembeli.profil');
        }
        else
        {
        return view('laundry.pembeli.profil-edit',['pembeli' => $pembeli]);
        }
    }

//proseseditprofil

    public function prosesEditProfil(Request $request, Pembeli $pembeli)
    {
        $validateData = $request->validate([
            'nama_pembeli'   => 'required|max:50|string',
            'no_hp_pembeli'  => 'required|digits_between:2,20|numeric',
            'foto'      => 'required|max:2000|mimes:png,jpg,jpeg',
            'id_user' => 'required',
            'alamat_pembeli' => 'required|max:200',
        ]);

        $id = Auth::user()->id;
        $extFile = $request->foto->getClientOriginalExtension();
        $namaFile = "profil-{$id}".".".$extFile;
        $request->foto->move('image/pembeli',$namaFile);
        $path = "/image/pembeli/".$namaFile;
        $validateData['foto'] = $path;
        
        Pembeli::where('id_user', $id)->update($validateData);
        $request->session()->flash('pesan', "Perbarui Profil {$validateData['nama_pembeli']} Berhasil");
        return redirect()->route('pembeli.profil');
    }

    public function riwayatOrder(Pembeli $pembeli, Riwayat $riwayat, Request $request)
    {
        $find = Auth::user()->id;
        $pembeli = DB::table('pembelis')->where('id_user',$find)->first();        

        $search =  $request->input('q');
        if($search!=""){
            $riwayat = Toko::join('pakets','pakets.id_toko', '=', 'tokos.id_toko')
                    ->join('riwayats', 'riwayats.id_paket', '=', 'pakets.id_paket')
                    ->join('pembelis','pembelis.id_pembeli','=','riwayats.id_pembeli')
                    ->where('riwayats.id_pembeli',$pembeli->id_pembeli)
                    ->select('riwayats.created_at as created_at','riwayats.id_order as id_order','riwayats.id_paket as id_paket',
                'riwayats.nama_paket as nama_paket','pembelis.nama_pembeli as nama_pembeli','riwayats.total_bayar as total_bayar',
                'riwayats.id_pembeli as id_pembeli','riwayats.status as status','tokos.no_hp_toko as no_hp_toko')
                    ->where(function ($query) use ($search)
            {
                $query->where('riwayats.nama_paket', 'like', '%'.$search.'%')
                    ->orWhere('nama_pembeli', 'like', '%'.$search.'%')
                    ->orWhere('riwayats.id_paket', 'like', '%'.$search.'%')
                    ->orWhere('id_order', 'like', '%'.$search.'%')
                    ->orWhere('total_bayar', 'like', '%'.$search.'%')
                    ->orWhere('riwayats.created_at', 'like', '%'.$search.'%')
                    ->orWhere('riwayats.status', 'like', '%'.$search.'%');

            })
            ->paginate(20);
            $riwayat->appends(['q' => $search]);
        }
        else{
            $riwayat = Toko::join('pakets','pakets.id_toko', '=', 'tokos.id_toko')
            ->join('riwayats', 'riwayats.id_paket', '=', 'pakets.id_paket')
            ->join('pembelis','pembelis.id_pembeli','=','riwayats.id_pembeli')
            ->select('riwayats.created_at as created_at','riwayats.id_order as id_order','riwayats.id_paket as id_paket',
    'riwayats.nama_paket as nama_paket','pembelis.nama_pembeli as nama_pembeli','riwayats.total_bayar as total_bayar',
    'riwayats.id_pembeli as id_pembeli','riwayats.status as status','riwayats.updated_at as updated_at','tokos.no_hp_toko as no_hp_toko')
            ->where('riwayats.id_pembeli',$pembeli->id_pembeli)
            ->paginate(20);
        }
        return view('laundry.pembeli.riwayat-order',['pembeli' => $pembeli, 'riwayat' => $riwayat]);
    }

    public function cancelRiwayatOrder(Request $request, Riwayat $riwayat)
    {
    $find = Auth::user()->id;
    $pembeli = DB::table('pembelis')->where('id_user',$find)->first();

    if($riwayat->id_pembeli != $pembeli->id_pembeli)
    {
        return redirect()->route('pembeli.riwayat.order');
    }

    $riwayat->status = 'Cancel';
    $riwayat->save();
    $request->session()->flash('pesan2', "Order berhasil dicancel");
    return redirect()->route('pembeli.riwayat.order');
    }
}
