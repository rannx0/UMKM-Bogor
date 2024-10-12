@extends('layouts.frontend')

@section('title', 'Dashboard')

@section('content')
<!-- START HERO -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="mt-1">
                    <div>
                        <h4 class="text-white-50 ms-1">Welcome to</h4>
                    </div>
                    <h2 class="h1 text-white fw-normal mb-4 mt-3 hero-title">
                        Sistem Manajemen Database dan Pelayanan Usaha UMKM Kota Bogor
                    </h2>

                    <p class="mb-4 font-16 text-white-50">
                        "Memfasilitasi pengelolaan database UMKM, pemantauan keuangan, dan pengelompokan wilayah
                        administratif. Sistem ini mendukung efisiensi operasional, transparansi, serta memudahkan
                        registrasi dan pengawasan UMKM di Kota Bogor."
                    </p>

                    <a href="{{ route('data-umkm')}}" class="btn btn-success">Selengkapnya <i
                            class="mdi mdi-arrow-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-md-5 offset-md-2">
                <div class="text-md-end mt-3 mt-md-0">
                    <img src="assets/images/startup.svg" alt="" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END HERO -->

<!-- START ABOUT US -->
<section class="py-5" id="about-us">
    <div class="container">
        <div class="row pb-3 pt-5 align-items-center">
            <div class="col-lg-6 col-md-5">
                <h2 class="fw-bold ">About Us</h2>
                <p class="text-muted mt-3">Sistem Operasional Layanan Usaha UMKM Kota Bogor adalah platform digital yang
                    dirancang untuk mendukung pengelolaan dan pengawasan usaha mikro, kecil, dan menengah (UMKM) di Kota
                    Bogor. Kami hadir untuk mempermudah proses pendaftaran usaha dan memperkuat transparansi dalam
                    pengelolaan data.</p>

                <h5 class="text-muted mt-3">Fokus Kami:</h5>

                <div class="mt-1">
                    <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Pengelolaan Database UMKM:
                        Memastikan seluruh data usaha terstruktur dan mudah diakses.</p>
                    <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Pemantauan Keuangan Usaha:
                        Memonitor perkembangan keuangan UMKM secara akurat dan transparan.
                    </p>
                    <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Efisiensi Operasional:
                        Meningkatkan efektivitas pengelolaan data dan registrasi usaha di Kota Bogor.
                    </p>
                    <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Transparansi: Menjamin
                        keterbukaan dalam pemantauan usaha UMKM.
                    </p>
                </div>

                <p class="text-muted mt-3">
                    Kami berkomitmen untuk mendukung UMKM dalam tumbuh dan berkembang secara optimal di Kota Bogor.
                </p>

                {{-- <a href="#" class="btn btn-success rounded-pill mt-3">Read More <i
                        class="mdi mdi-arrow-right ms-1"></i></a> --}}

            </div>
            <div class="col-lg-5 col-md-6 offset-md-1">
                <img src="assets/images/features-2.svg" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>
<!-- END ABOUT US -->

<!-- START TOP UMKM -->
<section class="py-5 bg-light" id="data-umkm">
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="mt-0 text-primary"><i class="mdi mdi-infinity"></i></h1>
                    <h3>Latest <span class="text-primary">UMKM Database</span> in <span class="text-primary">Bogor City</span></h3>
                    <p class="text-muted mt-2">An Overview of Newly Registered Micro, Small, and Medium Enterprises in the Database, Supporting Local Economic Growth</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($topCategories as $index => $category)
                <div class="col-lg-4 col-md-6">
                    <div class="card category-card text-center shadow-sm border-0 p-4 my-3">
                        <a href="{{ route('data-umkm') }}">
                        <div class="avatar-sm m-auto mb-3">
                            <!-- Membungkus icon dengan link ke route 'data-umkm' -->
                                <span class="avatar-title bg-primary-lighten rounded-circle icon-circle">
                                    <i class="text-primary font-24">{{ $index + 1 }}</i>
                                </span>
                            </div>
                            <h4 class="mt-3">{{ $category->nama }}</h4>
                            <p class="text-muted mt-2 mb-0">
                                Total UMKM: {{ $category->usaha_count }}
                            </p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- END TOP UMKM -->

<!-- START FAQ -->
<section class="py-5" id="faqs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="mt-0"><i class="mdi mdi-frequently-asked-questions"></i></h1>
                    <h3>Frequently Asked <span class="text-primary">Questions</span></h3>
                    <p class="text-muted mt-2">Here are some of the most common questions about the UMKM Database
                        System. For more information, feel free to reach out to us.</p>

                    <button type="button" class="btn btn-success btn-sm mt-2"><i class="mdi mdi-email-outline me-1"></i>
                        Email us your question</button>
                    <button type="button" class="btn btn-info btn-sm mt-2 ms-1"><i class="mdi mdi-whatsapp me-1"></i>
                        Send us a WhatsApp</button>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-5 offset-lg-1">
                <!-- Pertanyaan/Jawaban -->
                <div>
                    <div class="faq-question-q-box">Q.</div>
                    <h4 class="faq-question text-body">Bagaimana cara mendaftar UMKM di sistem ini?</h4>
                    <p class="faq-answer mb-4 pb-1 text-muted">Anda dapat mendaftar UMKM dengan membuat akun di platform
                        kami dan mengisi formulir pendaftaran usaha. Setelah mengisi data usaha, Anda akan menerima
                        konfirmasi melalui email.</p>
                </div>

                <!-- Pertanyaan/Jawaban -->
                <div>
                    <div class="faq-question-q-box">Q.</div>
                    <h4 class="faq-question text-body">Dokumen apa yang diperlukan untuk pendaftaran?</h4>
                    <p class="faq-answer mb-4 pb-1 text-muted">Anda perlu menyediakan salinan identitas usaha (NIB) dan
                        bukti alamat usaha. Dokumen ini dapat diunggah selama proses pendaftaran.</p>
                </div>
            </div>
            <!--/col-lg-5 -->

            <div class="col-lg-5">
                <!-- Pertanyaan/Jawaban -->
                <div>
                    <div class="faq-question-q-box">Q.</div>
                    <h4 class="faq-question text-body">Apakah ada biaya untuk mendaftar UMKM?</h4>
                    <p class="faq-answer mb-4 pb-1 text-muted">Tidak, proses pendaftaran UMKM dalam sistem ini
                        sepenuhnya gratis.</p>
                </div>

                <!-- Pertanyaan/Jawaban -->
                <div>
                    <div class="faq-question-q-box">Q.</div>
                    <h4 class="faq-question text-body">Bagaimana cara memperbarui informasi usaha saya?</h4>
                    <p class="faq-answer mb-4 pb-1 text-muted">Setelah masuk, Anda dapat memperbarui detail usaha dengan
                        mengakses bagian 'Usaha Saya' dan mengedit kolom yang diperlukan. Pembaruan akan langsung
                        terlihat.</p>
                </div>
            </div>
            <!--/col-lg-5-->
        </div>
        <!-- end row -->
    </div> <!-- end container-->
</section>
<!-- END FAQ -->

<!-- START CONTACT -->
<section class="py-5 bg-light-lighten border-top border-bottom border-light" id="contact-us">
    <div class="container" >
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h3>Get <span class="text-primary">In</span> Touch</h3>
                    <p class="text-muted mt-2">Please fill out the form below, and we will get back to you shortly. For further information, feel free to reach out to us.
                    </p>
                </div>
            </div>
        </div>

        <div class="row align-items-center mt-3">
            <div class="col-md-4">
                <p class="text-muted"><span class="fw-bold">Dukungan Pelanggan:</span><br> <span class="d-block mt-1">+62 857 1761 3102</span></p>
                <p class="text-muted mt-4"><span class="fw-bold">Alamat Email:</span><br> <span class="d-block mt-1">umkmbogor@gmail.com</span></p>
                <p class="text-muted mt-4"><span class="fw-bold">Alamat Kantor:</span><br> <span class="d-block mt-1">Bogor</span></p>
            </div>

            <div class="col-md-8">
                <form>
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="fullname" class="form-label">Nama Anda</label>
                                <input class="form-control form-control-light" type="text" id="fullname" placeholder="Nama...">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="emailaddress" class="form-label">Email Anda</label>
                                <input class="form-control form-control-light" type="email" required="" id="emailaddress" placeholder="Masukkan email Anda...">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-12">
                            <div class="mb-2">
                                <label for="subject" class="form-label">Subjek</label>
                                <input class="form-control form-control-light" type="text" id="subject" placeholder="Masukkan subjek...">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-12">
                            <div class="mb-2">
                                <label for="comments" class="form-label">Pesan</label>
                                <textarea id="comments" rows="4" class="form-control form-control-light" placeholder="Ketik pesan Anda di sini..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12 text-end">
                            <button class="btn btn-primary">Kirim Pesan <i class="mdi mdi-telegram ms-1"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- END CONTACT -->

@endsection