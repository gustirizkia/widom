@extends('layouts.user')

@section('title')
    Detail Projek
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-3">
                    <label for="" class="form-label">
                        Nama Projek
                    </label>
                    <h3 class="h3">
                        {{ $projek->nama }}
                    </h3>
                </div>

                <div class="mb-3 col-md-3">
                    <label for="" class="form-label">
                        Image
                    </label>
                    <a class="d-block overlay" data-fslightbox="lightbox-basic" href="{{ asset("storage/$projek->image") }}"
                        style="width: 60px; height: 60px;">
                        <!--begin::Image-->
                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded "
                            style="background-image:url('{{ asset("storage/$projek->image") }}'); width: 60px; height: 60px;">
                        </div>
                        <!--end::Image-->

                        <!--begin::Action-->
                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                            <i class="bi bi-eye-fill text-white fs-2x"></i>
                        </div>
                        <!--end::Action-->
                    </a>
                </div>

                <div class="mb-3 col-md-3">
                    <label for="" class="form-label">
                        Jasa yang dipilih
                    </label>
                    <div class="">
                        @foreach ($projek->projekHasKategoriJasa as $item)
                            <span class="badge text-bg-primary text-white">{{ $item->kategoriJasa->nama }}</span>
                        @endforeach

                    </div>
                </div>

                <div class="mb-3 col-md-7 ">
                    <label for="" class="form-label">
                        Keterangan
                    </label>
                    <textarea readonly class="form-control">{{ $projek->deskripsi }}</textarea>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addScript')
    <script src="{{ asset('be/dist/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
@endpush
