@extends('layouts.front')

@section('title')
    WISDOM
@endsection

@push('addStyle')
    <style>
        .header {
            min-height: 400px;
            background-image: url("{{ asset('image/bg-header.png') }}");
            background-size: cover;
            margin-top: -10px;
        }

        #produk {
            background-color: #F2F2F2;
        }

        .card__produk {
            border: unset;
            border-radius: 20px;
            background-color: white !important;
        }

        .card__produk img {

            border-radius: 20px;
        }
    </style>
@endpush

@section('content')
    {{-- Header --}}
    <div class="header d-flex flex-row align-items-center h-100">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h1 class="h1 text-white fw-bold">
                        Ciptakan dan produksi <br> apa saja
                    </h1>
                    <h5 class="text-white">
                        Rancang, rekayasa, dan produksi produk yang lebih baik dengan desain dan manufaktur produk kami.
                    </h5>

                    <div class="btn text_primary fw-bold px-5 my-3" style="background: white">
                        Mulai Video
                    </div>
                </div>
            </div>
            <div class="text-white">
                <h6>
                    <i class="bi bi-arrow-right-circle"></i> <span class="ms-2">Semua Produk Kami</span>
                </h6>
            </div>
        </div>
    </div>
    {{-- Header emd --}}

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

    <div id="produk" class="py-5">
        <div class="container">
            <div class="row">
                @foreach ($produk as $item)
                    <div class="col-md-3 mb-3">
                        <div class="card__produk p-4">
                            <a href="{{ route('product.show', $item->slug) }}" style="text-decoration: unset;"
                                class="text-dark">
                                <img src="{{ asset('storage/' . $item->imageThumbnail->image) }}"
                                    alt="Produk {{ $item->nama }}" class="img-fluid">
                                <div class="title fw-bold text_primary mt-2">
                                    {{ $item->nama }}
                                </div>
                                <div class="my-1">
                                    {{ $item->kategori->nama }}
                                </div>
                                <div class="fw-bold text_primary mb-3">
                                    Rp. {{ number_format($item->harga) }}
                                </div>
                            </a>
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <input type="text" name="slug" hidden value="{{ $item->slug }}">
                                <button type="submit" class="btn btn_primary w-100">
                                    Add To Card
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
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
