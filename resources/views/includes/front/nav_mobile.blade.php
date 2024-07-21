<nav class="navbar navbar-expand-lg bg-body-tertiary bg_primary navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Wisdom</a>
        <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
            id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <img src="{{ asset('image/logo_with_name.png') }}" alt="logo wisdom">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="fw-bold mb-4">
                    Home
                </div>
                <div class="fw-bold mb-4">
                    <div class="dropdown">
                        <div class=" " data-bs-toggle="dropdown" aria-expanded="false">
                            Produk
                        </div>
                        <ul class="dropdown-menu list_kategori_produk_mobile">
                        </ul>
                    </div>
                </div>
                <div class="fw-bold mb-4">
                    Service
                </div>
                <div class="fw-bold mb-4">
                    About Us
                </div>
            </div>
        </div>

    </div>
</nav>

@push('addScript')
    <script>
        $.ajax({
            url: "{{ route('dataNavbar') }}",
            method: "GET",
            success: function(data) {
                let kategori_produk = data.kategori_produk;

                kategori_produk.forEach(element => {
                    $(".list_kategori_produk_mobile").append(`
                        <a class="fw-bold mb-4 dropdown-item" href="/product?kategori[]=${element.slug}"
                            style="text-decoration: unset; color: unset">
                            ${element.nama}
                        </a>
                    `)
                });
            },
            error: function(err) {
                console.log('err', err)
            }
        })
    </script>
@endpush
