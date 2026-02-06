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
use App\Http\Requests\Validator;

class PenjualController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('');
        $this->middleware('penjual');
    }
//index
    public function index(Penjual $penjual)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();
        $file = collect([]);
        $toko = null;
        $paket = ([]);
        $riwayat = ([]);
        if($penjual != null)
        {
            $toko = Toko::where('id_penjual',$penjual->id_penjual)->first();
            if($toko != null)
            {
                $paket = Paket::where('id_toko',$toko->id_toko)->paginate(5);
                $riwayat = Toko::join('pakets','pakets.id_toko', '=', 'tokos.id_toko')
                ->join('riwayats', 'riwayats.id_paket', '=', 'pakets.id_paket')
                ->join('pembelis','pembelis.id_pembeli','=','riwayats.id_pembeli')
                ->where('tokos.id_toko',$toko->id_toko)->
                select('riwayats.created_at as created_at','riwayats.id_order as id_order','riwayats.id_paket as id_paket',
                'riwayats.nama_paket as nama_paket','pembelis.nama_pembeli as nama_pembeli','riwayats.total_bayar as total_bayar'
                ,'riwayats.status as status','riwayats.updated_at as updated_at')
                ->latest('created_at')->paginate(5);
                
            }
        }
        
        if(File::exists(public_path('/image/galeri/'.Auth::user()->id.'/')))
        {
        $filecari = File::files(public_path('/image/galeri/'.Auth::user()->id.'/'));
        $file = collect($filecari);
        }
        return view('laundry.penjual.penjual',['penjual' => $penjual,'toko'=>$toko,'paket'=>$paket,'riwayat'=>$riwayat,'file'=>$file]);
    }

//myprofil
    public function myprofil(Penjual $penjual)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();
        if($penjual == null)
        {
            return redirect()->route('penjual.buat.profil');
        }
        else
        {
        return view('laundry.penjual.profil',['penjual' => $penjual]);
        }
    }
//buatprofil
    public function buatProfil(Request $request, Penjual $penjual)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();

        if($penjual == null)
        {
            return view('laundry.penjual.profil-buat',['penjual' => $penjual]);
        }
        else
    {
        if ($penjual->id_user == $find)
        {
            $request->session()->flash('pesan1', "Data profil anda sudah dibuat ");
            return redirect()->route('penjual.profil');
        }
        else 
        {
        return view('laundry.penjual.profil-buat',['penjual' => $penjual]);
        }
    }
    }

//prosesbuatprofil

    public function prosesBuatProfil(Request $request)
    {
        $validateData = $request->validate([
            'nama_penjual'   => 'required|max:50|string',
            'no_hp_penjual'  => 'required|digits_between:6,20|numeric',
            'foto'      => 'required|max:2000|mimes:png,jpg,jpeg',
            'id_user' => 'required',
            'alamat_penjual' => 'required|max:200'
        ]);

        $id = Auth::user()->id;
        $extFile = $request->foto->getClientOriginalExtension();
        $namaFile = "profil-{$id}".".".$extFile;
        $request->foto->move('image/penjual',$namaFile);
        $path = "/image/penjual/".$namaFile;
        //$pathBaru = asset('image/penjual/'.$namaFile);
        $validateData['foto'] = $path;
        
        Penjual::create($validateData);

        $request->session()->flash('pesan', "Buat Profil {$validateData['nama_penjual']} Berhasil");
        return redirect()->route('penjual.profil');

    }

//editprofil

    public function editProfil(Penjual $penjual)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();

        if($penjual == null)
        {
            return redirect()->route('penjual.profil');
        }
        else
        {
        return view('laundry.penjual.profil-edit',['penjual' => $penjual]);
        }
    }

//proseseditprofil

    public function prosesEditProfil(Request $request, Penjual $penjual)
    {
        $validateData = $request->validate([
            'nama_penjual'   => 'required|max:50|string',
            'no_hp_penjual'  => 'required|digits_between:6,20|numeric',
            'foto'      => 'required|max:2000|mimes:png,jpg,jpeg',
            'id_user' => 'required',
            'alamat_penjual' => 'required|max:200'
        ]);

        $id = Auth::user()->id;
        $extFile = $request->foto->getClientOriginalExtension();
        $namaFile = "profil-{$id}".".".$extFile;
        $request->foto->move('image/penjual',$namaFile);
        $path = "/image/penjual/".$namaFile;
        //$pathBaru = asset('image/penjual/'.$namaFile);
        $validateData['foto'] = $path;
        
        Penjual::where('id_user', $id)->update($validateData);
        $request->session()->flash('pesan', "Perbarui Profil {$validateData['nama_penjual']} Berhasil");
        return redirect()->route('penjual.profil');
    }

//mytoko

    public function mytoko(Paket $paket, Penjual $penjual, Toko $toko,Request $request)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();
        $file = collect([]); 

        if($penjual == null)
        {
            $request->session()->flash('pesan2', "Buat Profil Terlebih dahulu");
            return redirect()->route('penjual.buat.profil');
        }
        else
        {
        $toko = Toko::where('id_penjual',$penjual->id_penjual)->first();

        if($toko == null)
        {
            $request->session()->flash('pesan2', "Buka Toko Terlebih dahulu");
            return redirect()->route('buka.toko');
        }
        else
        {
        
        $toko = DB::table('tokos')->where('id_penjual',$penjual->id_penjual)->first();
        
        if(File::exists(public_path('/image/galeri/'.Auth::user()->id.'/')))
        {
        $filecari = File::files(public_path('/image/galeri/'.Auth::user()->id.'/'));
        $file = collect($filecari);
        }
        $paket = Paket::where('id_toko',$toko->id_toko)->get();
        return view('laundry.penjual.mytoko',['penjual' => $penjual, 'toko' => $toko, 'paket' => $paket, 'file' => $file]);
       
        }
        }
    }

//bukatoko

    public function bukatoko(Penjual $penjual)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();
        return view('laundry.penjual.bukatoko',['penjual' => $penjual]);
    }

//prosesbukatoko

    public function prosesbuattoko(Penjual $penjual, Toko $toko, Request $request)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();
        $validateData = $request->validate([
            'nama_toko'   => 'required|max:50|string',
            'no_hp_toko'  => 'required|digits_between:6,20|numeric',
            'alamat_toko'      => 'required|max:200',
            'id_user' => 'required',
            'sosmed' => 'max:15',
            'id_penjual' => 'required',
        ]);

        Toko::create($validateData);
        $request->session()->flash('pesan', "Toko {$validateData['nama_toko']} Telah Dibuka");
        return redirect()->route('my.toko');
    }

//edittoko

    public function edittoko(Penjual $penjual)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();
        return view('laundry.penjual.edittoko',['penjual' => $penjual]);
    }

//prosesedittoko

    public function prosesedittoko(Penjual $penjual, Toko $toko, Request $request)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();
        $validateData = $request->validate([
            'nama_toko'   => 'required|max:50|string',
            'no_hp_toko'  => 'required|digits_between:6,20|numeric',
            'alamat_toko'      => 'required|max:200',
            'id_user' => 'required',
            'sosmed' => '',
            'id_penjual' => 'required',
        ]);

        Toko::where('id_user', $find)->update($validateData);
        $request->session()->flash('pesan', "Perbarui Toko {$validateData['nama_toko']} Berhasil");
        return redirect()->route('my.toko');
    }
//buatgaleri
    public function buatgaleri(Penjual $penjual)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();
        $toko = DB::table('tokos')->where('id_penjual',$penjual->id_penjual)->first();
        return view('laundry.penjual.buat-galeri',['penjual' => $penjual,'toko' => $toko]);
    }

    public function prosesbuatgaleri(Penjual $penjual, Request $request, Toko $toko)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();
        $toko = DB::table('tokos')->where('id_penjual',$penjual->id_penjual)->first();
       
        request()->validate([
            'foto' => 'required',
            'foto.*' => 'mimes:jpeg',
            'id_toko' => 'required',
          ]);
        
           if($request->hasfile('foto'))
            {
                $no = 1;
               foreach($request->file('foto') as $file)
               {
                   $extFile = $file->getClientOriginalExtension();
                   $filename = $no++.".".$extFile;
                   $file->move(public_path().'/image/galeri/'.Auth::user()->id.'/', $filename);  
                   $insert[]['foto'] = "$filename";

                   if($no == 6)
                   {
                       break;
                   }
               }
            }
           
            $request->session()->flash('pesan', "Galeri berhasil dibuat");
            return redirect()->route('my.toko');
     
    }

    //BUAT PAKET

    public function buatPaket()
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();
        $toko = DB::table('tokos')->where('id_penjual',$penjual->id_penjual)->first();
        return view('laundry.penjual.paket-buat',['penjual' => $penjual,'toko' => $toko]);
    }

//prosesbuatpaket
    
    public function prosesBuatPaket(Paket $paket, Request $request)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();
        
        $valid = $request->validate([
            'nama_paket'   => 'required|max:20',
            'deskripsi_paket'    => 'max:300',
            'harga_per_kiloan'      => 'required|digits_between:2,8|numeric',
            'id_toko'   => 'required',
            'opsi_antar'   => 'required|string',
        ]);
        Paket::create($valid);
        $request->session()->flash('pesan', "Buat Paket {$valid['nama_paket']} Berhasil");
        return redirect()->route('my.toko');
    }

    //editpaket

    public function editPaket(Paket $paket)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();
        $toko = DB::table('tokos')->where('id_penjual',$penjual->id_penjual)->first();

        if($paket->id_toko != $toko->id_toko)
        {
            return redirect()->route('my.toko');
        }
        else
        {
            return view('laundry.penjual.paket-edit',['penjual' => $penjual,'toko' => $toko ,'paket' => $paket]);
        }
    }

    public function prosesEditPaket(Request $request, Paket $paket)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();
        
        $valid = $request->validate([
            'nama_paket'   => 'required|max:20',
            'deskripsi_paket'    => 'max:300',
            'harga_per_kiloan'      => 'required|digits_between:2,8|numeric',
            'id_toko'   => 'required',
            'opsi_antar'   => 'required|string',
        ]);
        $id = $request->id_paket;
        Paket::where('id_paket',$id)->update($valid);
        $request->session()->flash('pesan', "Perbarui Paket Berhasil");
        return redirect()->route('my.toko');
        
    }
    //delete paket

    public function deletePaket(Request $request , Paket $paket)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();
        $toko = DB::table('tokos')->where('id_penjual',$penjual->id_penjual)->first();

        if($paket->id_toko != $toko->id_toko)
        {
            return redirect()->route('my.toko');
        }

        else
        {
        $paket->delete();
        $request->session()->flash('pesan2', "Paket berhasil dihapus");
        return redirect()->route('my.toko');
        }
    }

    //riwayatorder

    public function riwayatOrder(Penjual $penjual, Riwayat $riwayat, Request $request)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();

        if($penjual == null)
        {
            $request->session()->flash('pesan2', "Buat Profil Terlebih dahulu");
            return redirect()->route('penjual.buat.profil');
        }

        $toko = DB::table('tokos')->where('id_penjual',$penjual->id_penjual)->first();
        if($toko == null)
        {
            $request->session()->flash('pesan2', "Buka toko Terlebih dahulu");
            return redirect()->route('buka.toko');
        }
       
        $paket = DB::table('pakets')->where('id_toko',$toko->id_toko)->get();

        $search =  $request->input('q');
        if($search!=""){
            $riwayat = Toko::join('pakets','pakets.id_toko', '=', 'tokos.id_toko')
                    ->join('riwayats', 'riwayats.id_paket', '=', 'pakets.id_paket')
                    ->join('pembelis','pembelis.id_pembeli','=','riwayats.id_pembeli')
                    ->where('tokos.id_toko',$toko->id_toko)
                    ->select('riwayats.created_at as created_at','riwayats.id_order as id_order','riwayats.id_paket as id_paket',
                'riwayats.nama_paket as nama_paket','pembelis.nama_pembeli as nama_pembeli','riwayats.total_bayar as total_bayar',
                'riwayats.id_pembeli as id_pembeli','riwayats.status as status')
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
                'riwayats.id_pembeli as id_pembeli','riwayats.status as status','riwayats.updated_at as updated_at')
                        ->where('tokos.id_toko',$toko->id_toko)
                        ->paginate(20);
        }
        return view('laundry.penjual.riwayat-order',['penjual' => $penjual, 'riwayat' => $riwayat]);
    }

    //editriwayat
    public function editRiwayatOrder(Riwayat $riwayat)
    {
        $find = Auth::user()->id;
        $penjual = DB::table('penjuals')->where('id_user',$find)->first();
        $paket = Toko::join('pakets','pakets.id_toko','=','tokos.id_toko')->where('tokos.id_penjual',$penjual->id_penjual)
        ->where('pakets.id_paket','=',$riwayat->id_paket)->first();

        $pembeli = Pembeli::where('id_pembeli',$riwayat->id_pembeli)->first();
        if($paket == null )
        {
            return redirect()->route('my.toko');
        }
        else
        {
            return view('laundry.penjual.edit-riwayat',['riwayat'=>$riwayat,'penjual'=>$penjual,'paket'=>$paket,'pembeli'=>$pembeli]);
        }
        
    }

    public function prosesEditRiwayatOrder(Request $request)
    {
        $validateData = $request->validate([
            'nama_paket'   => 'required',
            'id_paket'  => 'required',
            'id_pembeli'      => 'required',
            'total_bayar' => 'required|numeric',
            'status' => 'required',
        ]);

        Riwayat::where('id_order',$request->id_order)->update($validateData);
        $request->session()->flash('pesan', "Perbarui Status Berhasil");
        return redirect()->route('penjual.riwayat.order');
    }

}
