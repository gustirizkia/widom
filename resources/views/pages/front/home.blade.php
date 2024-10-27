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
    @include('includes._modal_video', [
        'videoYtb' => $webConfig->where('flag', 'youtube_url')->first(),
    ])
    {{-- Header --}}
    <div class="header d-flex flex-row align-items-center h-100">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h1 class="h1 text-white fw-bold">
                        {{ contentWeb('title_header_home') }}
                    </h1>
                    <h5 class="text-white">
                        {{ contentWeb('subtitle_header_home') }}
                    </h5>

                    <div class="btn text_primary fw-bold px-5 my-3" style="background: white" data-bs-toggle="modal"
                        data-bs-target="#modalVideo">
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



    {{-- <div class="ratio ratio-16x9">
        <iframe src="https://www.youtube.com/embed/UUUWIGx3hDE-n8?rel=0" title="YouTube video" allowfullscreen></iframe>
    </div> --}}

    <div class="about mt-5 py-4">
        <div class="container">
            <div class="row justify-content-center align-items-center g-5">
                <div class="col-md-5">
                    <img src="{{ asset('image/about.png') }}" alt="" class="img-fluid" data-bs-toggle="modal"
                        data-bs-target="#modalVideo">
                </div>
                <div class="col-md-7">
                    <h2 class="h2">
                        {{ contentWeb('title_about') }}
                    </h2>
                    <p style="font-size: 20px; font-weight: 500">
                        {{ contentWeb('subtitle_about') }}
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

    <x-informasi-component />
@endsection
