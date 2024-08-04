@extends('layouts.user')

@section('title')
    Detail Transaksi {{ $transaksi->kode }}
@endsection

@push('addStyle')
    <style>
        .cart_image {
            width: 130px;
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    @foreach ($transaksi->detail as $item)
                        <div class="card card-bordered">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <img src="{{ asset('storage/' . $item->produk->imageThumbnail->image) }}"
                                            alt="{{ $item->produk->nama }}" class="img-fluid cart_image rounded me-3">
                                    </div>
                                    <div class="">
                                        <h6 class="h6 fw-bold mb-0">
                                            {{ $item->produk->nama }}
                                        </h6>
                                        <small class=" fw-bold mb-0">
                                            {{ $item->produk->kategori->nama }}
                                        </small>
                                        <br>
                                        <small class=" mb-0">
                                            Rp. {{ number_format($item->produk->harga) }}
                                        </small>
                                        <br>
                                        <small class=" mb-0">
                                            QTY {{ number_format($item->qty) }}
                                        </small>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
