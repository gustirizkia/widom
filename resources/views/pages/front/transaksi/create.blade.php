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

                            <select name="bank_id" class="form-select select2 bank">
                                <option value="">Pilih Bank</option>
                                @foreach ($bank as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <label class="label form-label ">
                                Alamat Pengiriman
                            </label>

                            <div class="mb-3">
                                <select name="provinsi" class="form-select select2 provinsi"
                                    data-placeholder="Pilih provinsi">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinsi as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <select name="kota" class="form-select select2 mb-3 kota" data-placeholder="Pilih kota">
                                    <option value="">Pilih Kota</option>

                                </select>
                            </div>

                            <div class="mb-3">
                                <select name="kecamatan" class="form-select select2 mb-3 kecamatan"
                                    data-placeholder="Pilih kecamatan">
                                    <option value="">Pilih kecamatan</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <textarea name="alamat_lengkap" class="form-control" placeholder="Villa pamulang"></textarea>
                            </div>
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

                    <div class="btn btn_primary w-100 mt-4 submit_data">
                        Checkout
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


@push('addScript')
    <script>
        $(".provinsi").on("change", function() {
            let value = $(this).val();

            $.ajax({
                url: `{{ url('kota') }}/${value}`,
                method: "GET",
                success: function(data) {
                    let tagHtml = "<option value="
                    ">Pilih Kota</option>";

                    data.forEach(element => {
                        tagHtml += `<option value="${element.id}">${element.name}</option>`
                    });

                    $(".kota").html(tagHtml);
                },
                error: function(err) {
                    console.log('err', err)
                }
            })
        });
        $(".kota").on("change", function() {
            let value = $(this).val();

            $.ajax({
                url: `{{ url('kecamatan') }}/${value}`,
                method: "GET",
                success: function(data) {
                    let tagHtml = "<option value="
                    ">Pilih Kota</option>";

                    data.forEach(element => {
                        tagHtml += `<option value="${element.id}">${element.name}</option>`
                    });

                    $(".kecamatan").html(tagHtml);
                },
                error: function(err) {
                    console.log('err', err)
                }
            })
        });

        $(".submit_data").on("click", function() {
            let bank = $(".bank").val();
            let provinsi = $(".provinsi").val();
            let kota = $(".kota").val();
            let kecamatan = $(".kecamatan").val();
            let alamat_lengkap = $(".alamat_lengkap").val();

            let errMsg = null;

            if (bank === "") {
                errMsg = "Pilih Bank Terlebih Dahulu";
            } else if (provinsi === "") {
                errMsg = "Pilih Provinsi Terlebih Dahulu";
            } else if (kota === "") {
                errMsg = "Pilih Kota Terlebih Dahulu";
            } else if (kecamatan === "") {
                errMsg = "Pilih Kecamatan Terlebih Dahulu";
            } else if (alamat_lengkap === "") {
                errMsg = "Isi Alamat Lengkap Telebih Dahulu"
            }



            if (errMsg) {
                Swal.fire({
                    icon: "info",
                    title: errMsg
                });

                return;
            }

            $("form").submit();



        })
    </script>
@endpush
