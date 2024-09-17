@extends('layouts.front')


@push('metaTag')
    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $blog->nama }}" />
    <meta name="description" content="{{ $blog->deskripsi_singkat }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('detail-blog', $blog->slug) }}" />
    <meta property="og:title" content="{{ $blog->nama }}" />
    <meta property="og:description" content="{{ $blog->deskripsi_singkat }}" />
    <meta property="og:image" content="{{ asset("storage/$blog->image") }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ route('detail-blog', $blog->slug) }}" />
    <meta property="twitter:title" content="{{ $blog->nama }}" />
    <meta property="twitter:description" content="{{ $blog->deskripsi_singkat }}" />
    <meta property="twitter:image" content="{{ asset("storage/$blog->image") }}" />

    <!-- Meta Tags Generated with https://metatags.io -->
@endpush

@section('title')
    {{ $blog->nama }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/blog">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $blog->nama }}</li>
                    </ol>
                </nav>
                <img src="{{ asset("storage/$blog->image") }}" alt="Jasa wisdom" class="img-fluid rounded">

                <div class="mt-4">
                    <h1 class="h3">
                        {{ $blog->nama }}
                    </h1>
                </div>

                {!! $blog->body !!}

            </div>
        </div>
    </div>
@endsection
