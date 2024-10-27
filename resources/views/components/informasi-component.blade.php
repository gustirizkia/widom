  <div id="service" class="py-5">
      <div class="container">
          <div class="row">
              @foreach ($informasi as $itemInformasi)
                  <div class="col-md-4 mb-3">
                      <div class="card ">
                          <img src="/storage/{{ $itemInformasi->image }}" alt="Wisdom Produk"
                              class="img-fluid card-img-top">

                          <div class="card-body">
                              <div class="title fw-bold text_primary">
                                  {{ $itemInformasi->nama }}
                              </div>
                              <div class="my-1">
                                  {{ $itemInformasi->deskripsi_singkat }}
                              </div>

                          </div>
                          <div class="card-footer bg-white">
                              <i class="bi bi-arrow-right-circle"></i> <span class="ms-1">Pelajari informasi
                                  selengkapnya</span>
                          </div>
                      </div>
                  </div>
              @endforeach

          </div>
      </div>
  </div>
