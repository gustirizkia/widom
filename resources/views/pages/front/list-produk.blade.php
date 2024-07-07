@extends('layouts.front')

@section('title')
    PRODUK WISDOM
@endsection

@push('addStyle')
    <style>
        .card__produk {
            border-radius: 20px;
            background-color: white !important;
        }

        .card__produk img {

            border-radius: 20px;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="fw-bold text-center">Filter</div>

                        @for ($i = 1; $i < 5; $i++)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckDefault{{ $i }}">
                                <label class="form-check-label" for="flexCheckDefault{{ $i }}">
                                    Kategori {{ $i }}
                                </label>
                            </div>
                        @endfor

                        <div class="btn btn_primary w-100 mt-3">
                            Filter Data
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="col-md-4 mb-3">
                            <div class="card card__produk p-4">
                                <a href="{{ route('product.show', 'cutter-wisdom') }}" style="text-decoration: unset;"
                                    class="text-dark">
                                    <img src="{{ asset('image/produk.png') }}" alt="Wisdom Produk" class="img-fluid">
                                    <div class="title fw-bold text_primary">
                                        Cutter Wisdom (P/N) 00
                                    </div>
                                    <div class="my-1">
                                        Tools
                                    </div>
                                    <div class="fw-bold text_primary mb-3">
                                        Rp. 200.000
                                    </div>
                                </a>
                                <div class="btn btn-primary w-100 mb-3">
                                    Checkout
                                </div>
                                <div class="btn btn_primary w-100">
                                    Add To Card
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
