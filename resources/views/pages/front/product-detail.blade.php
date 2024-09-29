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

        .menu_item {
            background-color: #293241;
            color: white;
        }

        .benefit .button_item {
            border: 1px solid black;
        }

        .benefit .card_collape {
            border: 1px solid black;
        }

        .pertanyaan_umum .button_item {
            border: 1px solid black;
        }

        .pertanyaan_umum .card_collape {
            border: 1px solid black;
        }

        .menu_item {
            overflow-x: auto;
        }

        .menu_item .item {
            white-space: nowrap;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-between align-items-center">
            <div class="mb-3 col-md-6">
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
                <h3 class="h3 fw-bold">
                    {{ $produk->nama }}
                </h3>
                <h4>
                    Rp. {{ number_format($produk->harga) }}
                </h4>

                Temukan berbagai solusi dalam menangani masalah bisnis anda, untuk mengoptimalkan jalannya proses
                produksi dengan tenaga ahli kami

            </div>
        </div>
    </div>

    <section class="menu_item py-2 mt-3 px-3">
        <div class="d-flex justify-content-center">
            <div class="item mx-3">
                Keunggulan Wisdom
            </div>
            <div class="item mx-3">
                |
            </div>
            <div class="item mx-3">
                Aplikasi
            </div>
            <div class="item mx-3">
                |
            </div>
            <div class="item mx-3">
                Portofolio
            </div>
            <div class="item mx-3">
                |
            </div>
            <div class="item mx-3">
                Persyaratan Teknis
            </div>
            <div class="item mx-3">
                |
            </div>
            <div class="item mx-3">
                Pertanyaan Umum
            </div>
        </div>
    </section>
    <div class="keunggulan py-4" style="background-color: #F5F5F5">
        <h1 class="h3 text-center">
            Keunggulan Produk {{ $produk->nama }}
        </h1>
        <div class="container mt-4">
            @for ($i = 0; $i < 2; $i++)
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <div class="text-center">
                            <img src="https://i.pinimg.com/originals/5c/1a/db/5c1adb65fbfabcdcf6de3678508e45b4.png"
                                alt="" class="img-fluid mb-2" style="width: 40%">
                        </div>
                        <h5 class="text-center">
                            Probe
                        </h5>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam, eligendi!
                        </p>
                    </div>
                    <div class="col-md-2">
                        <div class="text-center">
                            <img src="https://i.pinimg.com/originals/5c/1a/db/5c1adb65fbfabcdcf6de3678508e45b4.png"
                                alt="" class="img-fluid mb-2" style="width: 40%">
                        </div>
                        <h5 class="text-center">
                            Probe
                        </h5>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam, eligendi!
                        </p>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    {{-- Keunggulan --}}
    <div class="container">
        <div class="py-4 benefit">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <h4 class="h3 fw-bold ">
                        Apa yang Dapat Anda Capai dengan Pemindai Kami
                    </h4>
                    <h5>
                        Temukan cara mengintegrasikan pemindai kami ke dalam alur kerja Anda dapat meningkatkan efisiensi
                        dan membantu Anda mencapai hasil yang luar biasa.
                    </h5>
                </div>
                <div class="col-md-8">

                    @for ($i = 0; $i < 7; $i++)
                        <div class="w-100 button_item p-3 mb-3 d-flex justify-content-between align-items-center fw-bold"
                            data-bs-toggle="collapse" data-bs-target="#collapseExample_{{ $i }}"
                            aria-expanded="false" aria-controls="collapseExample_{{ $i }}">
                            <div class="">
                                Item {{ $i + 1 }}
                            </div>
                            <div class="">
                                <svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.9979 30V18.9979H0.5V11.4979H11.9979V0H19.4979V11.4979H30.5V18.9979H19.4979V30H11.9979Z"
                                        fill="#01141A" />
                                </svg>

                            </div>
                        </div>
                        <div class="collapse" id="collapseExample_{{ $i }}">
                            <div class="card_collape p-3 mb-3">
                                Some placeholder content for the collapse component. This panel is hidden by default but
                                revealed when the user activates the relevant trigger.
                            </div>
                        </div>
                    @endfor


                </div>
            </div>
        </div>

    </div>
    {{-- Keunggulan end --}}


    <div class="gallery py-4" style="background-color: #F5F5F5">
        <div class="container">
            <h1 class="h3 text-center mb-4">
                {{ $produk->nama }} Gallery
            </h1>

            <div class="row justify-content-center">
                @for ($i = 0; $i < 5; $i++)
                    <div class="col-md-4 mb-3">
                        <img src="{{ asset('image/dummy2.png') }}" alt="" class="img-fluid">
                    </div>
                @endfor
            </div>
        </div>

    </div>

    <div id="service" class="py-5">
        <div class="container">
            <div class="row">
                @for ($i = 0; $i < 3; $i++)
                    <div class="col-md-4 mb-3">
                        <div class="card ">
                            <img src="https://images.unsplash.com/photo-1716191300020-b52dec5b70a8?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="Wisdom Produk" class="img-fluid card-img-top">

                            <div class="card-body">
                                <div class="title fw-bold text_primary">
                                    Apa yang ingin anda buat
                                </div>
                                <div class="my-1">
                                    Dapatkan Solusi Design Bersama Kami
                                    Masukan text informasi di sini minimal dua baris teks
                                </div>

                            </div>
                            <div class="card-footer bg-white">
                                <i class="bi bi-arrow-right-circle"></i> <span class="ms-1">Pelajari informasi
                                    selengkapnya</span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="pertanyaan_umum py-4">
        <h3 class="text-center h3">
            Pertanyaan Umum
        </h3>

        <div class="container">
            <div class="row justify-content-center g-0 mt-4">
                <div class="col-md-8">
                    <div class="row">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-md-6">
                                <div class="w-100 button_item p-3 mb-3 d-flex justify-content-between align-items-center fw-bold"
                                    data-bs-toggle="collapse" data-bs-target="#bagaimana_{{ $i }}"
                                    aria-expanded="false" aria-controls="bagaimana_{{ $i }}">
                                    <div class="">
                                        Bagaimana {{ $i + 1 }}
                                    </div>
                                    <div class="">
                                        <svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.9979 30V18.9979H0.5V11.4979H11.9979V0H19.4979V11.4979H30.5V18.9979H19.4979V30H11.9979Z"
                                                fill="#01141A" />
                                        </svg>

                                    </div>
                                </div>
                                <div class="collapse" id="bagaimana_{{ $i }}">
                                    <div class="card_collape p-3 mb-3">
                                        Some placeholder content for the collapse component. This panel is hidden by default
                                        but
                                        revealed when the user activates the relevant trigger.
                                    </div>
                                </div>

                            </div>
                        @endfor
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="sosmed py-4" style="background-color: #01141A">
        <div class="h6 text-center text-white">
            Sosial Media
        </div>
        <div class="text-center">
            <svg width="156" height="39" viewBox="0 0 156 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="1" y="8.5" width="22" height="22" rx="11" fill="white" />
                <rect x="1" y="8.5" width="22" height="22" rx="11" stroke="black" />
                <path
                    d="M10.7109 13.625V25H8.75V13.625H10.7109ZM15.3516 18.6016V20.1562H10.2109V18.6016H15.3516ZM16 13.625V15.1875H10.2109V13.625H16Z"
                    fill="black" />
                <rect x="34" y="8.5" width="22" height="22" rx="11" fill="white" />
                <rect x="34" y="8.5" width="22" height="22" rx="11" stroke="black" />
                <path
                    d="M42.5938 13.625L45.0078 17.7734L47.4219 13.625H49.6797L46.2422 19.2578L49.7656 25H47.4844L45.0078 20.7734L42.5312 25H40.2422L43.7734 19.2578L40.3281 13.625H42.5938Z"
                    fill="black" />
                <rect x="67" y="8.5" width="22" height="22" rx="11" fill="white" />
                <rect x="67" y="8.5" width="22" height="22" rx="11" stroke="black" />
                <path
                    d="M80.1797 16.5469V17.9219H75.4141V16.5469H80.1797ZM76.7891 14.4766H78.6719V22.6641C78.6719 22.9245 78.7083 23.125 78.7812 23.2656C78.8594 23.401 78.9661 23.4922 79.1016 23.5391C79.237 23.5859 79.3958 23.6094 79.5781 23.6094C79.7083 23.6094 79.8333 23.6016 79.9531 23.5859C80.0729 23.5703 80.1693 23.5547 80.2422 23.5391L80.25 24.9766C80.0938 25.0234 79.9115 25.0651 79.7031 25.1016C79.5 25.138 79.2656 25.1562 79 25.1562C78.5677 25.1562 78.1849 25.0807 77.8516 24.9297C77.5182 24.7734 77.2578 24.5208 77.0703 24.1719C76.8828 23.8229 76.7891 23.3594 76.7891 22.7812V14.4766Z"
                    fill="black" />
                <rect x="100" y="8.5" width="22" height="22" rx="11" fill="white" />
                <rect x="100" y="8.5" width="22" height="22" rx="11" stroke="black" />
                <path d="M111.984 13.625V25H110.023V13.625H111.984Z" fill="black" />
                <rect x="133" y="8.5" width="22" height="22" rx="11" fill="white" />
                <rect x="133" y="8.5" width="22" height="22" rx="11" stroke="black" />
                <path
                    d="M138.953 13.625H140.703L143.992 22.3984L147.273 13.625H149.023L144.68 25H143.289L138.953 13.625ZM138.156 13.625H139.82L140.109 21.2188V25H138.156V13.625ZM148.156 13.625H149.828V25H147.867V21.2188L148.156 13.625Z"
                    fill="black" />
            </svg>

        </div>
    </div>

    <div class="help py-4" style="background-color: #F5F5F5">
        <h3 class="text-center">
            Butuh Dukungan dalam Memilih Produk Anda?
        </h3>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p class="text-center" style="font-size: 22px">
                        Beri tahu kami detail proyek Anda! Tim ahli kami akan merekomendasikan solusi terbaik untuk Anda.
                    </p>

                    <div class="text-center">
                        <a href="" class="btn btn-primary ">Hubungi Kami</a>
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

        $("#button-plus").on("click", function() {
            let qty = parseInt($(".qty").val());

            $(".qty").val(qty + 1)

        })

        $("#button-min").on("click", function() {
            let qty = parseInt($(".qty").val());

            if (qty > 1) {
                $(".qty").val(qty - 1)
            }

        })
    </script>
@endpush
