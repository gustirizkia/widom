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
                                                data-harga="{{ $item->produk->harga }}" type="button">-</button>
                                            <button class="btn btn-outline-secondary plus_qty"
                                                data-id="{{ $item->id }}" data-harga="{{ $item->produk->harga }}"
                                                type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse


                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="h5">
                                Ringkasan belanja
                            </div>

                            <div class="d-md-flex justify-content-between mb-3">
                                <div class="">
                                    Total Item
                                </div>
                                <div class="total_qty">

                                </div>
                            </div>
                            <div class="d-md-flex justify-content-between">
                                <div class="">
                                    Total Harga
                                </div>
                                <div class="total_harga">

                                </div>
                            </div>

                            @if (count($myCart))
                                <button class="btn btn_primary w-100 mt-4">
                                    Checkout
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


@push('addScript')
    <script>
        let total_harga = parseFloat({{ $totalHarga }})
        let total_qty = parseInt({{ $myCart->sum('qty') }});

        function format_rupiah(value) {
            return value.toString()
                .replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        }

        $(".total_harga").text(`Rp. ${format_rupiah(total_harga)}`)
        $(".total_qty").text(`${format_rupiah(total_qty)}`)

        $(".plus_qty").on("click", function() {
            let id = $(this).attr("data-id");
            let value = $(`.input__qty_${id}`).val();

            let data_harga = parseFloat($(this).attr("data-harga"));

            total_harga += data_harga;

            $(".total_harga").text(`Rp. ${format_rupiah(total_harga)}`)

            total_qty += 1;

            $(".total_qty").text(`${format_rupiah(total_qty)}`)

            $(`.input__qty_${id}`).val(parseInt(value) + 1);

        });

        $(".min_qty").on("click", function() {
            let id = $(this).attr("data-id");
            let value = $(`.input__qty_${id}`).val();

            let data_harga = parseFloat($(this).attr("data-harga"));


            if (parseInt(value) > 1) {
                total_harga -= data_harga;

                $(".total_harga").text(`Rp. ${format_rupiah(total_harga)}`)

                total_qty -= 1;

                $(".total_qty").text(`${format_rupiah(total_qty)}`)

                $(`.input__qty_${id}`).val(parseInt(value) - 1);

            }

        })
    </script>
@endpush
