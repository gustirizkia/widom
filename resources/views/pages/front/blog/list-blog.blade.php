@extends('layouts.front')

@section('title')
    List Blog
@endsection



@push('addStyle')
    <style>
        header {
            background-image: url("{{ asset('image/bg-header.png') }}");
            min-height: 300px;
            background-size: cover;
            margin-top: -10px;
        }

        a {
            text-decoration: unset;
            color: unset;
        }
    </style>
@endpush

@section('content')
    <main>
        <header class="d-flex flex-column justify-content-center align-items-center">
            <h1 class="h1 fw-bold text-white">
                Blog
            </h1>
        </header>

        <div class="container my-4">
            <div class="row">
                @forelse ($blog as $item)
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('detail-blog', $item->slug) }}">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset("storage/$item->image") }}" alt="Jasa wisdom"
                                        class="img-fluid rounded">
                                    <h3 class="h5 text-center mt-3">
                                        {{ $item->nama }}
                                    </h3>
                                    <p class="text-center mb-0">
                                        {{ $item->deskripsi_singkat }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    {{-- <div class="col-12">
                        <div class="text-center">
                            <h2>
                                Tidak Ada Data
                            </h2>
                        </div>
                    </div> --}}
                @endforelse

            </div>
        </div>

        <div class="about mt-5 py-4" style="background-color: #F5F5F5">
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
                            Mulai dari bangunan ramah lingkungan hingga produk pintar hingga produk blockbuster yang
                            memukau,
                            orang-orang di seluruh industri memercayai proses produksi untuk
                            membantu mereka merancang dan membuat apa pun.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
