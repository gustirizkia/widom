<nav class="navbar navbar-expand-lg bg-body-tertiary bg_primary navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Wisdom</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Service</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-bell"></i> <span> Notification</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-heart"></i> <span> Favorite</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-cart"></i> <span> Cart</span>
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
            <div class="input-group">
                <input type="text" class="form-control form-control-sm" name="q" style="border: unset">
                <button class="btn " type="button" style="background-color: white">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </div>
</nav>
