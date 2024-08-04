@extends('layouts.front')

@section('title')
    Proses Transaksi
@endsection

@push('addScript')
    <style>
        .cart_image {
            width: 130px;
        }
    </style>
@endpush

@section('content')
    <div class="container mt-4">

        <form action="{{ route('transaksi.store') }}" method="post">
            @csrf
            <input type="text" name="checkout" value="1" hidden>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Proses Transaksi</li>
                        </ol>
                    </nav>
                    @forelse ($produk as $item)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <img src="{{ asset('storage/' . $item->imageThumbnail->image) }}"
                                            alt="{{ $item->nama }}" class="img-fluid cart_image rounded me-3">
                                    </div>
                                    <div class="">
                                        <h6 class="h6 fw-bold mb-0">
                                            {{ $item->nama }}
                                        </h6>
                                        <small class=" fw-bold mb-0">
                                            {{ $item->kategori->nama }}
                                        </small>
                                        <br>
                                        <small class=" mb-0">
                                            Rp. {{ number_format($item->harga) }}
                                        </small>
                                        <br>
                                        <small class=" mb-0">
                                            QTY {{ number_format($item->qty) }}
                                        </small>
                                        <input type="text" value="{{ $item->id }}" name="produk_id[]" hidden>
                                        <input type="number" name="qty[]" value="{{ $item->qty }}" hidden
                                            class="form-control input__qty_{{ $item->id }}" placeholder="Qty"
                                            aria-label="Qty" aria-describedby="basic-addon{{ $item->id }}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

                    <div class="card mb-3">
                        <div class="card-body">
                            <label class="label form-label">
                                Pilih Bank
                            </label>

                            <select name="bank_id" class="form-select select2">
                                <option value="">Pilih Bank</option>
                                @foreach ($bank as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <label class="label form-label">
                                Rincian Transaksi
                            </label>

                            <div class="mb-2">
                                <div class="fw-bold">
                                    Total Pesanan
                                </div>
                                <div class="">
                                    {{ $totalItem }}
                                </div>
                            </div>
                            <div class="mb-2">
                                <input type="number" value="{{ $totalHarga }}" hidden name="amount">
                                <div class="fw-bold">
                                    Total Harga
                                </div>
                                <div class="text-success">
                                    Rp. {{ number_format($totalHarga) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn_primary w-100 mt-4">
                        Checkout
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
