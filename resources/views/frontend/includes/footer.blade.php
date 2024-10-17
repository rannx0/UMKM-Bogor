<!-- START FOOTER -->
<footer class="bg-dark py-4">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <img src="{{ asset('storage/configuration/' . $configuration->logo) }}" alt="" class="logo-dark"
                    height="30" />
                <div class="w-50">
                    <p class="text-muted mt-4">{{ $configuration->deskripsi_footer }}</p>
                </div>

                <ul class="social-list list-inline mt-3">
                    @if ($configuration->show_facebook)
                    <li class="list-inline-item text-center">
                        <a href="{{ $configuration->link_facebook }}"
                            class="social-list-item border-primary text-primary" target="_blank">
                            <i class="mdi mdi-facebook"></i>
                        </a>
                    </li>
                    @endif

                    @if ($configuration->show_youtube)
                    <li class="list-inline-item text-center">
                        <a href="{{ $configuration->link_youtube }}" class="social-list-item border-danger text-danger"
                            target="_blank">
                            <i class="mdi mdi-youtube"></i>
                        </a>
                    </li>
                    @endif

                    @if ($configuration->show_twitter)
                    <li class="list-inline-item text-center">
                        <a href="{{ $configuration->link_twitter }}" class="social-list-item border-info text-info"
                            target="_blank">
                            <i class="mdi mdi-twitter"></i>
                        </a>
                    </li>
                    @endif

                    @if ($configuration->show_instagram)
                    <li class="list-inline-item text-center">
                        <a href="{{ $configuration->link_instagram }}"
                            class="social-list-item border-secondary text-secondary" target="_blank">
                            <i class="mdi mdi-instagram"></i>
                        </a>
                    </li>
                    @endif

                    @if ($configuration->show_whatsapp)
                    <li class="list-inline-item text-center">
                        <a href="{{ $configuration->link_whatsapp }}"
                            class="social-list-item border-success text-success" target="_blank">
                            <i class="mdi mdi-whatsapp"></i>
                        </a>
                    </li>
                    @endif
                </ul>


            </div>

            <div class="col-lg-2 col-md-4 mt-3 mt-lg-0">
                <h5 class="text-light">Tentang Kami</h5>

                <ul class="list-unstyled ps-0 mb-0 mt-3">
                    <li class="mt-2"><a href="#" class="text-muted">Profil UMKM</a></li>
                    <li class="mt-2"><a href="#" class="text-muted">Visi dan Misi</a></li>
                    <li class="mt-2"><a href="#" class="text-muted">Kontak Kami</a></li>
                    <li class="mt-2"><a href="#" class="text-muted">FAQ</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-4 mt-3 mt-lg-0">
                <h5 class="text-light">Layanan</h5>

                <ul class="list-unstyled ps-0 mb-0 mt-3">
                    <li class="mt-2"><a href="#" class="text-muted">Registrasi UMKM</a></li>
                    <li class="mt-2"><a href="#" class="text-muted">Pembiayaan</a></li>
                    <li class="mt-2"><a href="#" class="text-muted">Pelatihan</a></li>
                    <li class="mt-2"><a href="#" class="text-muted">Marketplace</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-4 mt-3 mt-lg-0">
                <h5 class="text-light">Informasi</h5>

                <ul class="list-unstyled ps-0 mb-0 mt-3">
                    <li class="mt-2"><a href="#" class="text-muted">Berita UMKM</a></li>
                    <li class="mt-2"><a href="#" class="text-muted">Panduan Usaha</a></li>
                    <li class="mt-2"><a href="#" class="text-muted">Kebijakan Privasi</a></li>
                </ul>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="mt-4">
                    <p class="text-muted mt-2 text-center mb-0">{{$configuration->footer_name}}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->