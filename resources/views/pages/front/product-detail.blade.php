@extends('layouts.front')

@section('title')
    Product Detail
@endsection

@push('addStyle')
    <style>
        .detail .accordion {
            border: unset;

        }

        .detail .accordion-item {
            border: unset;
        }

        .detail .accordion-header {
            border: unset;
            background-color: #F5F5F5;
        }

        .detail .accordion-button:not(.collapsed) {
            background-color: #F5F5F5;
        }

        .detail .accordion-button {
            background-color: #F5F5F5;
        }

        .img_product {
            width: 100px;
            margin-right: 10px;
        }

        .img_product.active {
            border: 2px solid rgb(0, 81, 162);
        }

        .list_img {
            overflow-x: auto;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="mb-3 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <img src="{{ asset('image/produk.png') }}" alt=""
                                class="w-100 mb-4 rounded img-fluid thumbnail">
                        </div>
                        <div class="d-flex justify-content-center list_img">
                            <div class="">
                                <img src="{{ asset('image/produk.png') }}" alt="" class="img-fluid img_product">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 col-md-5">
                <div class="card detail shadow-sm">
                    <div class="card-body">
                        <h3 class="h3 fw-bold">
                            {{ $produk->nama }}
                        </h3>
                        <h4>
                            Rp. {{ number_format($produk->harga) }}
                        </h4>

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Detail Produk
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="fw-bold">
                                            Stok 34
                                        </div>
                                        <div class="fw-bold">
                                            Lebar {{ $produk->lebar }} MM
                                        </div>
                                        <div class="fw-bold">
                                            Panjang {{ $produk->panjang }} MM
                                        </div>
                                        <div class="fw-bold">
                                            Tinggi {{ $produk->tinggi }} MM
                                        </div>

                                        <div class="fw-bold">
                                            Warna {{ $produk->warna }}
                                        </div>
                                        <div class="fw-bold">
                                            Minimal Order {{ $produk->minimal_order }} MM
                                        </div>
                                        <div class="fw-bold">
                                            Material {{ $produk->material }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Kelengkapan
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $produk->kelengkapan !!}
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Fitur
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $produk->fitur !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <a href="" class="btn btn_primary w-100">
                                Add To Cart <i class="bi bi-cart"></i>
                            </a>
                        </div>
                        <div class="mt-3">
                            <a href="" class="btn btn-primary w-100">
                                Order
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addScript')
    <script>
        let imgProduk = [];

        @foreach ($produk->image as $item)

            imgProduk.push("{{ asset('storage') }}" + "/{{ $item->image }}")
        @endforeach

        function selectImageActive(idx) {
            $(".thumbnail").attr("src", imgProduk[parseInt(idx)])

            let tagHtml = "";
            imgProduk.forEach((element, index) => {
                tagHtml += `
                    <div class="" onclick="selectImageActive(${index})">
                        <img src="${element}" alt="" class="img-fluid img_product ${parseInt(index) === parseInt(idx) ? "active" : ''}">
                    </div>
                `;
            });

            $(".list_img").html(tagHtml)
        }

        selectImageActive(0)
    </script>
@endpush
