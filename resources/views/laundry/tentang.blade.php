@extends('layouts.main')
@section('title','TENTANG KAMI')

@section('search')
                                <li>
                                    <a href="/pesan" class="btn btn-primary btn-lg btn-block btn-round">Lihat Paket</a>
                                </li>
                                    
@endsection

@section('content')
<section class="services-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-10">
                        <h4 class="title">Mengapa Pilih Kami?</h4>
                        <p class="text">Kami adalah layanan pemesanan laundry online dimana kami mewadahi penjual sebagai jasa laundry dan tamu sebagai pembeli </p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-package"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">Siap Pesan Antar</h4>
                                    <p class="text">Kami menyediakan layanan pesan antar kapanpun dan dimanapun anda berada.</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class=" lni-protection"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">Aman dan Nyaman</h4>
                                    <p class="text">Kami menyediakan layanan yang tentu aman dan nyaman saat dipakai. </p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-bolt"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">Fitur sederhana tapi lengkap</h4>
                                    <p class="text">Kami menyediakan fitur-fitur sederhana namun powerfull.</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-support"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">24/7 Support</h4>
                                    <p class="text">Kami selalu menyediakan layanan support dan bantuan selama 24/7.</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- row -->
            </div> <!-- row -->
        </div> <!-- conteiner -->
        <div class="services-image d-lg-flex align-items-center">
            <div class="image">
                <img src="/images/laundrykartun.png" alt="Services">
            </div>
        </div> <!-- services image -->
    </section>
@endsection