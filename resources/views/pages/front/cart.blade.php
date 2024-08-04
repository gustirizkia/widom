@extends('layouts.front')

@section('title')
    My Cart
@endsection

@push('addScript')
    <style>
        .cart_image {
            width: 130px;
        }
    </style>
@endpush

@section('content')
    <div class="container mt-3">
        <form action="{{ route('transaksi.store') }}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-7">
                    @forelse ($myCart as $item)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div class="">
                                        <img src="{{ asset('storage/' . $item->produk->imageThumbnail->image) }}"
                                            alt="{{ $item->produk->nama }}" class="img-fluid cart_image rounded me-3">
                                    </div>
                                    <div class="mt-md-0 mt-3">
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
                                        <input type="text" value="{{ $item->produk_id }}" name="produk_id[]" hidden>

                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="basic-addon{{ $item->id }}">QTY</span>
                                            <input type="number" name="qty[]" value="{{ $item->qty }}"
                                                class="form-control input__qty_{{ $item->id }}" placeholder="Qty"
                                                aria-label="Qty" aria-describedby="basic-addon{{ $item->id }}">
                                            <button class="btn btn-outline-secondary min_qty" data-id="{{ $item->id }}"
                                                type="button">-</button>
                                            <button class="btn btn-outline-secondary plus_qty"
                                                data-id="{{ $item->id }}" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

                    @if (count($myCart))
                        <button class="btn btn_primary w-100 mt-4">
                            Checkout
                        </button>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection


@push('addScript')
    <script>
        $(".plus_qty").on("click", function() {
            let id = $(this).attr("data-id");
            let value = $(`.input__qty_${id}`).val();
            $(`.input__qty_${id}`).val(parseInt(value) + 1);

        });

        $(".min_qty").on("click", function() {
            let id = $(this).attr("data-id");
            let value = $(`.input__qty_${id}`).val();
            if (parseInt(value) > 1) {
                $(`.input__qty_${id}`).val(parseInt(value) - 1);

            }

        })
    </script>
@endpush
