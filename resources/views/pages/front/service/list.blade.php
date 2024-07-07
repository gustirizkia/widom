@extends('layouts.front')

@section('title')
    Service
@endsection

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="row">
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://images.unsplash.com/photo-1611117775350-ac3950990985?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzB8fG1hbnVmYWN0dXJpbmd8ZW58MHx8MHx8fDA%3D"
                                    alt="" class="img-fluid mb-2 rounded">
                                <h4 class="fw-bold text-center">
                                    Design
                                </h4>
                                <p class="text-center">
                                    Masukan syarat pengajuan disini minimal seperti jenis file atau keterangan lanjutan
                                    minimal
                                    tiga baris
                                </p>
                                <div class="text-center">
                                    <a href="" class="fw-bold text-primary " style="text-decoration: unset">
                                        Informasi Selengkapnya
                                    </a>
                                </div>

                                <div class="btn btn_primary mt-4 w-100">
                                    Add Project
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="about mt-5 py-4">
        <div class="container">
            <div class="row justify-content-center align-items-center g-5">
                <div class="col-md-5">
                    <img src="{{ asset('image/about.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-7">
                    <h2 class="h2">
                        Lihat hal-hal menakjubkan yang dirancang dan dibuat oleh wisdom
                    </h2>
                    <p style="font-size: 20px; font-weight: 500">
                        Mulai dari bangunan ramah lingkungan hingga produk pintar hingga produk blockbuster yang memukau,
                        orang-orang di seluruh industri memercayai proses produksi untuk
                        membantu mereka merancang dan membuat apa pun.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div id="service" class="py-5">
        <div class="container">
            <div class="row">
                @for ($i = 0; $i < 4; $i++)
                    <div class="col-md-4 mb-3">
                        <div class="card ">
                            <img src="https://images.unsplash.com/photo-1716191300020-b52dec5b70a8?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="Wisdom Produk" class="img-fluid card-img-top">

                            <div class="card-body">
                                <div class="title fw-bold text_primary">
                                    Apa yang ingin anda buat
                                </div>
                                <div class="my-1">
                                    Dapatkan Solusi Design Bersama Kami
                                    Masukan text informasi di sini minimal dua baris teks
                                </div>

                            </div>
                            <div class="card-footer bg-white">
                                <i class="bi bi-arrow-right-circle"></i> <span class="ms-1">Pelajari informasi
                                    selengkapnya</span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
