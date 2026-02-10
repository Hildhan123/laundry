<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Validator;
use App\Models\User;
use App\Models\Admin;
use App\Models\Riwayat;
use App\Models\Penjual;
use App\Models\Pembeli;
use App\Models\Paket;
use App\Models\Toko;
use Illuminate\Support\Facades\DB;
use Auth;
use File;
use Illuminate\Support\Facades\Hash;

//php artisan make:migration create_admins_table --create=admins

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('');
        $this->middleware('admin');
    }
//index
    public function index(Request $request, Admin $admin)
    {
        $find = Auth::user()->id;
        $admin = DB::table('admins')->where('id_user',$find)->first();

        $user = User::latest()->paginate(5);
        $penjual = Penjual::latest()->paginate(5);
        $toko = Toko::latest()->paginate(5);
        $paket = Paket::latest()->paginate(5);
        $pembeli = Pembeli::latest()->paginate(5);
        $riwayat = Pembeli::join('riwayats','riwayats.id_pembeli','=','pembelis.id_pembeli')->latest('riwayats.created_at')->paginate(5);
        //return dump($penjual);
        return view('laundry.admin.admin',['admin' => $admin, 'penjual' => $penjual, 'pembeli' => $pembeli, 'riwayat' => $riwayat,'user' => $user,'toko'=>$toko,'paket'=>$paket]);
    }

//buatakun

    public function buatUser()
    {
        $find = Auth::user()->id;
        $admin = DB::table('admins')->where('id_user',$find)->first();
        return view('laundry.admin.user-buat',['admin' => $admin]);
    }

    public function prosesBuatUser(Request $request)
    {
        $validateData = $request->validate([
            'name'   => 'required|max:50|string',
            'email'  => 'required|email',
            'peran'      => 'required',
            'password' => 'required|string|min:8',
        ]);

        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        $request->session()->flash('pesan', "Buat Akun {$validateData['name']} Berhasil");
        return redirect()->route('admin.user');
    }

//myprofil
    public function myprofil(Admin $admin)
    {
        $find = Auth::user()->id;
        $admin = DB::table('admins')->where('id_user',$find)->first();
        if($admin == null)
        {
            return redirect()->route('admin.buat.profil');
        }
        else
        {
        return view('laundry.admin.profil',['admin' => $admin]);
        }
    }
//buatprofil
    public function buatProfil(Request $request, Admin $admin)
    {
        $find = Auth::user()->id;
        $admin = DB::table('admins')->where('id_user',$find)->first();

        if($admin == null)
        {
            return view('laundry.admin.profil-buat',['admin' => $admin]);
        }
        else
    {
        if ($admin->id_user == $find)
        {
            $request->session()->flash('pesan1', "Data profil anda sudah dibuat ");
            return redirect()->route('admin.profil');
        }
        else 
        {
        return view('laundry.admin.profil-buat',['admin' => $admin]);
        }
    }
    }

//prosesbuatprofil

    public function prosesBuatProfil(Request $request)
    {
        $validateData = $request->validate([
            'nama_admin'   => 'required|max:50|string',
            'no_hp_admin'  => 'required|digits_between:2,20|numeric',
            'foto'      => 'required|max:2000|mimes:jpg,png,jpeg',
            'id_user' => 'unique:admins,id_user',
        ]);

        $id = Auth::user()->id;
        $extFile = $request->foto->getClientOriginalExtension();
        $namaFile = "profil-{$id}".".".$extFile;
        $request->foto->move(public_path().'/image/admin',$namaFile);
        $path = "/image/admin/".$namaFile;
        //$pathBaru = asset('image/admin/'.$namaFile);
        $validateData['foto'] = $path;
        
        Admin::create($validateData);
        $request->session()->flash('pesan', "Buat Profil {$validateData['nama_admin']} Berhasil");
        return redirect()->route('admin.profil');

    }

    //editakun

    public function editUser(User $user)
    {
        $find = Auth::user()->id;
        $admin = DB::table('admins')->where('id_user',$find)->first();
        return view('laundry.admin.user-edit',['admin' => $admin, 'user' => $user]);
    }

    //prosesedit

    public function ProsesEditUser(Request $request)
    {
        $validateData = $request->validate([
            'name'   => 'required|max:50|string',
            'email'  => 'required|email',
            'peran'      => 'required',
            'password' => 'required|string|min:8',
            'id' => 'required',
        ]);

        $validateData['password'] = Hash::make($validateData['password']);
        User::where('id',$request->id)->update($validateData);
        $request->session()->flash('pesan', "Edit Akun {$validateData['name']} Berhasil");
        return redirect()->route('admin.user');
    }

//deleteakun
    public function deleteUser( Request $request, User $user)
    {
        $pembeli = Pembeli::where('id_user',$user->id);
        $penjual = Penjual::where('id_user',$user->id)->first();
        if($pembeli != null)
        {
            $pembeli->delete();
        }
        if($penjual != null)
        {
            $toko = Toko::where('id_penjual',$penjual->id_penjual)->first();
            if($toko != null)
            {
                $paket = Paket::where('id_toko',$toko->id_toko)->delete();
                $toko->delete();
            }
            $penjual->delete();
        }
        $user->delete();
        $request->session()->flash('pesan2', "Akun berhasil dihapus");
        return redirect()->route('admin.user');
    }


//editprofil

    public function editProfil(Admin $admin)
    {
        $find = Auth::user()->id;
        $admin = DB::table('admins')->where('id_user',$find)->first();
        if($admin == null)
        {
            return redirect()->route('admin.profil');
        }
        else
        {
        return view('laundry.admin.profil-edit',['admin' => $admin]);
        }
    }


//proseseditprofil

    public function prosesEditProfil(Request $request, Admin $admin)
    {
        $validateData = $request->validate([
            'nama_admin'   => 'required|max:50|string',
            'no_hp_admin'  => 'required|digits_between:2,20|numeric',
            'foto'      => 'required|max:2000|mimes:jpg,png,jpeg',
            'id_user' => 'unique:admins,id_user',
        ]);

        $id = Auth::user()->id;
        $extFile = $request->foto->getClientOriginalExtension();
        $namaFile = "profil-{$id}".".".$extFile;
        $request->foto->move(public_path().'/image/admin',$namaFile);
        $path = "/image/admin/".$namaFile;
        //$pathBaru = public_path('/image/admin/'.$namaFile);
        $validateData['foto'] = $path;
        
        Admin::where('id_user', $id)->update($validateData);
        $request->session()->flash('pesan', "Perbarui Profil {$validateData['nama_admin']} Berhasil");
        return redirect()->route('admin.profil');
    }

//daftaruser

    public function daftarUser(Request $request)
    {
        $find = Auth::user()->id;
        $admin = DB::table('admins')->where('id_user',$find)->first();

        $search =  $request->input('q');
        if($search!=""){
            $user = User::where(function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('peran', 'like', '%'.$search.'%')
                    ->orWhere('updated_at', 'like', '%'.$search.'%');
            })
            ->paginate(20);
            $user->appends(['q' => $search]);
        }
        else{
            $user = User::paginate(20);
        }
        return view('laundry.admin.daftarUser',['admin' => $admin, 'user' => $user]);        
    }

    //daftarpenjual

    public function daftarPenjual(Admin $admin, Penjual $penjual, Request $request)
    {
        $find = Auth::user()->id;
        $admin = DB::table('admins')->where('id_user',$find)->first();

        $search =  $request->input('q');
        if($search!=""){
            $penjual = User::join('penjuals','penjuals.id_user','=','users.id')
            ->where(function ($query) use ($search){
                $query->where('nama_penjual', 'like', '%'.$search.'%')
                    ->orWhere('no_hp_penjual', 'like', '%'.$search.'%')
                    ->orWhere('alamat_penjual', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('penjuals.updated_at', 'like', '%'.$search.'%');
            })
            ->paginate(20);
            $penjual->appends(['q' => $search]);
        }
        else{
            $penjual = User::join('penjuals','penjuals.id_user','=','users.id')->paginate(20);
        }

        return view('laundry.admin.daftarPenjual',['admin' => $admin, 'penjual' => $penjual]);
    }
//deletepenjual
    public function deletePenjual(Request $request, Penjual $penjual)
    {
    $toko = Toko::where('id_penjual',$penjual->id_penjual)->first();
    if($toko != null)
    {
    $paket = Paket::where('id_toko','=',$toko->id_toko)->delete();
    }
    $toko->delete();
    $penjual->delete();
    $request->session()->flash('pesan2', "Hapus Data Berhasil");
    return redirect()->route('admin.penjual');
    }
//daftar tokos
    public function daftarToko(Request $request)
    {
        $find = Auth::user()->id;
        $admin = DB::table('admins')->where('id_user',$find)->first();

        $search =  $request->input('q');
        if($search!=""){
            $toko = Penjual::join('tokos','tokos.id_penjual','=','penjuals.id_penjual')
                ->where(function ($query) use ($search){
                $query->where('tokos.nama_toko', 'like', '%'.$search.'%')
                    ->orWhere('tokos.alamat_toko', 'like', '%'.$search.'%')
                    ->orWhere('penjuals.nama_penjual', 'like', '%'.$search.'%')
                    ->orWhere('tokos.sosmed', 'like', '%'.$search.'%')
                    ->orWhere('tokos.updated_at', 'like', '%'.$search.'%');
            })
            ->paginate(20);
            $toko->appends(['q' => $search]);
        }
        else{
            $toko = Penjual::join('tokos','tokos.id_penjual','=','penjuals.id_penjual')->paginate(20);
        }
        return view('laundry.admin.daftarToko',['admin' => $admin, 'toko' => $toko]);
    }

    //delete tokos
    public function deleteToko(Request $request, Toko $toko)
    {
    $file = public_path('/image/galeri/'.$toko->id_user.'/');
    $paket = Paket::where('id_toko','=',$toko->id_toko);
    if(File::exists($file))
    {
    File::deleteDirectory($file);
    }

    $paket->delete();
    $toko->delete();
    $request->session()->flash('pesan2', "Toko berhasil dihapus");
    return redirect()->route('admin.toko');
    }

    //daftar paket
    public function daftarPaket(Request $request)
    {
        $find = Auth::user()->id;
        $admin = DB::table('admins')->where('id_user',$find)->first();

        $search =  $request->input('q');
        if($search!=""){
            $paket = Toko::join('pakets','pakets.id_toko','=','tokos.id_toko')
                ->where(function ($query) use ($search){
                $query->where('pakets.nama_paket', 'like', '%'.$search.'%')
                    ->orWhere('pakets.deskripsi_paket', 'like', '%'.$search.'%')
                    ->orWhere('pakets.harga_per_kiloan', 'like', '%'.$search.'%')
                    ->orWhere('pakets.opsi_antar', 'like', '%'.$search.'%')
                    ->orWhere('tokos.nama_toko', 'like', '%'.$search.'%')
                    ->orWhere('pakets.updated_at', 'like', '%'.$search.'%');
            })
            ->paginate(20);
            $paket->appends(['q' => $search]);
        }
        else{
            $paket = Toko::join('pakets','pakets.id_toko','=','tokos.id_toko')->paginate(20);
        }
        return view('laundry.admin.daftarPaket',['admin' => $admin, 'paket' => $paket]);
    }
    //deletepaket
    public function deletePaket(Request $request, Paket $paket)
    {
        $paket->delete();
        $request->session()->flash('pesan2', "Paket berhasil dihapus");
        return redirect()->route('admin.paket');
    }

//daftapembeli

    public function daftarPembeli(Admin $admin, Pembeli $pembeli, Request $request)
    {
        $find = Auth::user()->id;
        $admin = DB::table('admins')->where('id_user',$find)->first();

        $search =  $request->input('q');
        if($search!=""){
            $pembeli = User::join('pembelis','pembelis.id_user','=','users.id')
            ->where(function ($query) use ($search){
                $query->where('nama_pembeli', 'like', '%'.$search.'%')
                    ->orWhere('no_hp_pembeli', 'like', '%'.$search.'%')
                    ->orWhere('alamat_pembeli', 'like', '%'.$search.'%')
                    ->orWhere('users.email', 'like', '%'.$search.'%')
                    ->orWhere('pembelis.updated_at', 'like', '%'.$search.'%');
            })
            ->paginate(20);
            $pembeli->appends(['q' => $search]);
        }
        else{
            $pembeli = User::join('pembelis','pembelis.id_user','=','users.id')->paginate(20);
        }
        return view('laundry.admin.daftarPembeli',['admin' => $admin, 'pembeli' => $pembeli]);
        //return dump($pembeli);
    }
//deletepembeli

    public function deletePembeli(Request $request, Pembeli $pembeli)
    {
        $pembeli->delete();
        $request->session()->flash('pesan2', "Profil Pembeli berhasil dihapus");
        return redirect()->route('admin.pembeli');
    }
//riwayatorder

    public function riwayatOrder(Admin $admin, Riwayat $riwayat, Request $request)
    {
        $find = Auth::user()->id;
        $admin = DB::table('admins')->where('id_user',$find)->first();

        $search =  $request->input('q');
        if($search!=""){
            $riwayat = Pembeli::join('riwayats','riwayats.id_pembeli','=','pembelis.id_pembeli')
                ->where(function ($query) use ($search){
                $query->where('riwayats.nama_paket', 'like', '%'.$search.'%')
                    ->orWhere('pembelis.nama_pembeli', 'like', '%'.$search.'%')
                    ->orWhere('riwayats.id_paket', 'like', '%'.$search.'%')
                    ->orWhere('riwayats.id_order', 'like', '%'.$search.'%')
                    ->orWhere('riwayats.total_bayar', 'like', '%'.$search.'%')
                    ->orWhere('riwayats.status', 'like', '%'.$search.'%')
                    ->orWhere('riwayats.updated_at', 'like', '%'.$search.'%');
            })
            ->paginate(20);
            $riwayat->appends(['q' => $search]);
        }
        else{
            $riwayat = Pembeli::join('riwayats','riwayats.id_pembeli','=','pembelis.id_pembeli')->paginate(20);
        }
        return view('laundry.admin.riwayatOrder',['admin' => $admin, 'riwayat' => $riwayat]);
    }

//deleteriwayat
    public function deleteRiwayatOrder(Request $request,Riwayat $riwayat)
    {
        $riwayat->delete();
        $request->session()->flash('pesan2', "Riwayat berhasil dihapus");
        return redirect()->route('admin.riwayat.order');
    }
    public function inbox()
    {
        return view('laundry.admin.daftarPenjual');
    }
}
