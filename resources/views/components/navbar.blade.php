<div class="d-md-block d-none">
    <nav class="navbar navbar-expand-lg bg_primary navbar-dark" style="border-bottom: 1px solid #707070">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="">
                    <img src="{{ asset('image/logo_desktop_dark.png') }}" class="img-fluid" alt="Logo Wisdom"
                        style="width: 148px;">
                </div>
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-4" style="min-width: 18rem;">
                        <form action="{{ route('product') }}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" name="q"
                                    placeholder="Cari data" value="{{ request()->get('q') }}" style="border: unset">
                                <button class="btn " type="button" style="background-color: white">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-bell"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-heart"></i>
                        </a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            <i class="bi bi-cart"></i>
                            @if (count($cart))
                                <span class="count__cart position-absolute">
                                    {{ $cart->sum('qty') }}
                                </span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        @if (auth()->user())
                            <a class="nav-link" href="/transaksi">
                                <i class="bi bi-person-circle"></i> <span
                                    class="ms-2">{{ auth()->user()->first_name }}</span>
                            </a>
                        @else
                            <a class="nav-link" href="/login">Login</a>
                        @endif
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <nav class="navbar navbar-expand-lg bg_primary navbar-dark">
        <div class="container">
            <div class="d-flex align-items-center">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Produk
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($kategoriProduk as $item)
                                    <li><a class="dropdown-item"
                                            href="/product?kategori[]={{ $item->slug }}">{{ $item->nama }}</a></li>
                                @endforeach
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/product">Lihat Semua Produk</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Service
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($kategoriJasa as $item)
                                    <li><a class="dropdown-item"
                                            href="/jasa?kategori[]={{ $item->slug }}">{{ $item->nama }}</a></li>
                                @endforeach
                                <li>
                                    <a class="dropdown-item" href="{{ route('projek.create') }}">Ajukan Projek</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/jasa">All Service</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                About Us
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($page as $item)
                                    <li><a class="dropdown-item"
                                            href="{{ route('page-web', $item->slug) }}">{{ $item->nama }}</a></li>
                                @endforeach

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('projek.create') }}">Ajukan Projek</a>
                                </li>

                            </ul>
                        </li>

                        {{-- <li class="nav-item ">
                            <a class="nav-link active" aria-current="page" href="/blog">Blog</a>

                        </li> --}}

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Blog
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($kategoriBlog as $item)
                                    <li><a class="dropdown-item"
                                            href="/blog?kategori={{ $item->slug }}">{{ $item->nama }}</a></li>
                                @endforeach

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/blog">Semua Blog</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>


<div class="d-md-none d-block">
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg_primary navbar-dark">
        <div class="container-fluid">
            <div class="d-flex">
                <div type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                    aria-controls="offcanvasScrolling">
                    <img src="{{ asset('image/logo_mobile.png') }}" alt="" class="img-fluid">
                </div>

            </div>
            <div class="ms-auto text-white d-flex">
                <div class="">
                    <i class="bi bi-search"></i>
                </div>
                <div class="ms-3"><i class="bi bi-bell"></i></div>
                {{-- <div class="ms-3"><i class="bi bi-heart"></i></div> --}}
                <div class="ms-3">
                    <i class="bi bi-cart"></i>
                    @if (count($cart))
                        <span class="count__cart position-absolute">
                            {{ $cart->sum('qty') }}
                        </span>
                    @endif
                </div>
                <div class="ms-3">
                    <a href="{{ route('transaksi.index') }}" class="text-white">
                        <i class="bi bi-person-circle"></i>
                    </a>
                </div>

            </div>


            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <img src="{{ asset('image/logo_with_name.png') }}" alt="logo wisdom">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <div class="fw-bold mb-4">
                        <a href="{{ route('cart.index') }}" style="color: unset; text-decoration: unset">
                            Cart
                        </a>
                    </div>
                    <div class="fw-bold mb-4">
                        <div class="dropdown">
                            <div class=" " data-bs-toggle="dropdown" aria-expanded="false">
                                Produk
                            </div>
                            <ul class="dropdown-menu">
                                @foreach ($kategoriProduk as $item)
                                    <li><a class="dropdown-item"
                                            href="/product?kategori[]={{ $item->slug }}">{{ $item->nama }}</a>
                                    </li>
                                @endforeach
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/product">Lihat Semua Produk</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="dropdown fw-bold mb-4">
                        <div class=" " data-bs-toggle="dropdown" aria-expanded="false">
                            Service
                        </div>
                        <ul class="dropdown-menu">
                            @foreach ($kategoriJasa as $item)
                                <li><a class="dropdown-item"
                                        href="/jasa?kategori[]={{ $item->slug }}">{{ $item->nama }}</a></li>
                            @endforeach
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/jasa">All Service</a></li>
                        </ul>
                    </div>
                    <div class="dropdown fw-bold mb-4">
                        <div class=" " data-bs-toggle="dropdown" aria-expanded="false">
                            About Us
                        </div>
                        <ul class="dropdown-menu">
                            @foreach ($page as $item)
                                <li><a class="dropdown-item"
                                        href="{{ route('page-web', $item->slug) }}">{{ $item->nama }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="dropdown fw-bold">
                        <div class=" " data-bs-toggle="dropdown" aria-expanded="false">
                            Blog
                        </div>
                        <ul class="dropdown-menu">
                            @foreach ($kategoriBlog as $item)
                                <li><a class="dropdown-item"
                                        href="/blog?kategori={{ $item->slug }}">{{ $item->nama }}</a></li>
                            @endforeach

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/blog">Semua Blog</a></li>
                        </ul>
                    </div>



                </div>
            </div>

        </div>
    </nav>
</div>
