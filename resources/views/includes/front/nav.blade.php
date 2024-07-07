<nav class="navbar navbar-expand-lg bg_primary navbar-dark" style="border-bottom: 1px solid #707070">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-4" style="min-width: 18rem;">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" name="q" style="border: unset">
                        <button class="btn " type="button" style="background-color: white">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
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
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-cart"></i>
                    </a>
                </li>
                <li class="nav-item">
                    @if (auth()->user())
                        <a class="nav-link" href="/logout">
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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/product">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/service">Service</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
