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
            padding-right: 10px;
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
                            Cutter Wisdom (PN 001)
                        </h3>
                        <h4>
                            Rp. 200.000
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
                                            Lebar 34 MM
                                        </div>
                                        <div class="fw-bold">
                                            Panjang 34 MM
                                        </div>
                                        <div class="fw-bold">
                                            Tinggi 34 MM
                                        </div>
                                        <div class="fw-bold">
                                            Kategori 34 MM
                                        </div>
                                        <div class="fw-bold">
                                            Warna Merah
                                        </div>
                                        <div class="fw-bold">
                                            Minimal Order 34 MM
                                        </div>
                                        <div class="fw-bold">
                                            Material Plastik
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
                                        <div class="fw-bold">
                                            Stok 34
                                        </div>
                                        <div class="fw-bold">
                                            Lebar 34 MM
                                        </div>
                                        <div class="fw-bold">
                                            Panjang 34 MM
                                        </div>
                                        <div class="fw-bold">
                                            Tinggi 34 MM
                                        </div>
                                        <div class="fw-bold">
                                            Kategori 34 MM
                                        </div>
                                        <div class="fw-bold">
                                            Warna Merah
                                        </div>
                                        <div class="fw-bold">
                                            Minimal Order 34 MM
                                        </div>
                                        <div class="fw-bold">
                                            Material Plastik
                                        </div>
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
                                        <div class="fw-bold">
                                            Stok 34
                                        </div>
                                        <div class="fw-bold">
                                            Lebar 34 MM
                                        </div>
                                        <div class="fw-bold">
                                            Panjang 34 MM
                                        </div>
                                        <div class="fw-bold">
                                            Tinggi 34 MM
                                        </div>
                                        <div class="fw-bold">
                                            Kategori 34 MM
                                        </div>
                                        <div class="fw-bold">
                                            Warna Merah
                                        </div>
                                        <div class="fw-bold">
                                            Minimal Order 34 MM
                                        </div>
                                        <div class="fw-bold">
                                            Material Plastik
                                        </div>
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
        let imgProduk = [
            "{{ asset('image/produk.png') }}",
            "https://images.unsplash.com/photo-1717386255773-1e3037c81788?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8bWFudWZhY3R1cmluZ3xlbnwwfHwwfHx8MA%3D%3D",
            "https://plus.unsplash.com/premium_photo-1664297475950-40a4e9aefea5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8bWFudWZhY3R1cmluZ3xlbnwwfHwwfHx8MA%3D%3D",
            "https://images.unsplash.com/photo-1717386255773-a456c611dc4e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fG1hbnVmYWN0dXJpbmd8ZW58MHx8MHx8fDA%3D",
            "https://images.unsplash.com/photo-1603114595714-55783a6dc1fe?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fG1hbnVmYWN0dXJpbmd8ZW58MHx8MHx8fDA%3D",
            "https://images.unsplash.com/photo-1676018366904-c083ed678e60?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fG1hbnVmYWN0dXJpbmd8ZW58MHx8MHx8fDA%3D"
        ];

        function selectImageActive(idx) {
            $(".thumbnail").attr("src", imgProduk[parseInt(idx)])

            let tagHtml = "";
            imgProduk.forEach((element, index) => {
                tagHtml += `
                    <div class="" onclick="selectImageActive(${index})">
                        <img src="${element}" alt="" class="img-fluid img_product">
                    </div>
                `;
            });

            $(".list_img").html(tagHtml)
        }

        selectImageActive(0)
    </script>
@endpush
