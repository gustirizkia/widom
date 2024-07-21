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

                        <form action="">
                            @foreach ($kategori as $index => $item)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->slug }}"
                                        name="kategori[]" id="flexCheckDefault{{ $index }}"
                                        {{ in_array($item->slug, $kategoriFilter) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault{{ $index }}">
                                        {{ $item->nama }}
                                    </label>
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn_primary w-100 mt-3">
                                Filter Data
                            </button>
                        </form>


                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @forelse ($items as $item)
                        <div class="col-md-4 mb-3">
                            <div class="card card__produk p-4">
                                <a href="{{ route('product.show', $item->slug) }}" style="text-decoration: unset;"
                                    class="text-dark">
                                    <img src="{{ asset('storage/' . $item->thumbnail->image) }}" alt="Wisdom Produk"
                                        class="img-fluid">
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
                                <div class="btn btn-primary w-100 mb-3">
                                    Checkout
                                </div>
                                <div class="btn btn_primary w-100">
                                    Add To Card
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            Tidak ada data
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
@endsection
