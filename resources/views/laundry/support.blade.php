@extends('layouts.main')
@section('title','Support Center')

@section('search')
                                <li>
                                    <a href="/pesan" class="btn btn-primary btn-lg btn-block btn-round">Lihat Paket</a>
                                </li>
                                    
@endsection

@section('content')
<div class="row justify-content-center">
<h1 class="list-group-item"><b>Hubungi Kami</b></h1>
<hr width="80%" color="black" size="20px"/>
<section id="tabel" class="tabel ">
<div class="row">
            <div class="col">
            </div> 
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Email</th>
                            <th scope="col">Whatsapp</th>
                        </tr>
                    </thead>
                    <tbody>       
                    @php $no = 1; @endphp    
                            
                            @forelse($admin as $a)
                        </tr>
                            <td>{{$no++}}</td>
                            <td>{{$a->nama_admin}}</td>
                            <td>{{$a->email}}</td>
                            <td>{{$a->no_hp_admin}}</td>
                            @empty
                            <td colspan="4" class="text-center">Tidak ada data...</td>
                        </tr>
                            @endforelse
                        
                        

                    </tbody>
                </table> 
            </div>
        </div>
  </section>
</div>
</div>
@endsection