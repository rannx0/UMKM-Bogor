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
                        <h4 class="text-white-50 ms-1">{{ $heroContent->title }}</h4>
                    </div>
                    <h2 class="h1 text-white fw-normal mb-4 mt-3 hero-title">{{ $heroContent->subtitle }}</h2>

                    <p class="mb-4 font-16 text-white-50">
                        {{ $heroContent->description }}
                    </p>

                    <a href="{{ route('data-umkm')}}" class="btn btn-success">Lihat data UMKM <i
                            class="mdi mdi-arrow-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-md-5 offset-md-2">
                <div class="text-md-end mt-3 mt-md-0">
                    <img src="{{ asset('storage/hero/' . $heroContent->image) }}" alt="" class="img-fluid" />
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
                <h2 class="fw-bold">{{ $aboutUs->title}}</h2>

                <!-- Tampilkan Deskripsi dari Database -->
                <p class="text-muted mt-3">
                    {{ $aboutUs->description ?? 'Sistem Operasional Layanan Usaha UMKM Kota Bogor adalah platform
                    digital yang dirancang untuk mendukung pengelolaan dan pengawasan usaha mikro, kecil, dan menengah
                    (UMKM) di Kota Bogor. Kami hadir untuk mempermudah proses pendaftaran usaha dan memperkuat
                    transparansi dalam pengelolaan data.' }}
                </p>

                <h5 class="text-muted mt-3">Fokus Kami:</h5>

                <div class="mt-1">
                    @php
                    $focusPoints = json_decode($aboutUs->focus_points ?? '[]', true);
                    @endphp

                    @if(!empty($focusPoints))
                    <!-- Loop untuk menampilkan setiap focus point -->
                    @foreach($focusPoints as $focusPoint)
                    <p class="text-muted">
                        <i class="mdi mdi-circle-medium text-success"></i> {{ $focusPoint }}
                    </p>
                    @endforeach
                    @else
                    <!-- Fokus default jika tidak ada data dari database -->
                    <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Pengelolaan Database UMKM:
                        Memastikan seluruh data usaha terstruktur dan mudah diakses.</p>
                    <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Pemantauan Keuangan Usaha:
                        Memonitor perkembangan keuangan UMKM secara akurat dan transparan.</p>
                    <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Efisiensi Operasional:
                        Meningkatkan efektivitas pengelolaan data dan registrasi usaha di Kota Bogor.</p>
                    <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Transparansi: Menjamin
                        keterbukaan dalam pemantauan usaha UMKM.</p>
                    @endif
                </div>

                <!-- Tampilkan Komitmen dari Database -->
                <p class="text-muted mt-3">
                    {{ $aboutUs->commitment ?? 'Kami berkomitmen untuk mendukung UMKM dalam tumbuh dan berkembang secara
                    optimal di Kota Bogor.' }}
                </p>
            </div>

            <!-- Tampilkan Gambar dari Database -->
            <div class="col-lg-5 col-md-6 offset-md-1">
                <img src="{{ $aboutUs->image ? Storage::url('public/about-us/' . $aboutUs->image) : 'assets/images/features-2.svg' }}"
                    class="img-fluid" alt="About Us Image">
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
                    <h3>{{$configuration->umkm_title}}</h3>
                    <p class="text-muted mt-2">
                        {{$configuration->umkm_title}}
                    </p>
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

        <div class="row mt-4">
            <div class="col-lg-12 text-center">
                <a href="{{ route('data-umkm') }}" id="view-umkm-btn" class="btn btn-primary shadow rounded-pill">
                    <i class="mdi mdi-eye-outline me-2"></i> Lihat Seluruh UMKM
                </a>
            </div>
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
                    <h3>{{$configuration->faq_title}}</h3>
                    <p class="text-muted mt-2">{{ $configuration->faq_subtitle}}</p>

                    <a href="mailto:{{$configuration->email}}" target="_blank">
                        <button type="button" class="btn btn-success btn-sm mt-2"><i
                                class="mdi mdi-email-outline me-1"></i>
                            Email us your question</button>
                    </a>
                    <a href="{{$configuration->link_whatsapp}}" target="_blank">
                        <button type="button" class="btn btn-info btn-sm mt-2 ms-1"><i
                                class="mdi mdi-whatsapp me-1"></i>
                            Send us a WhatsApp</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            @foreach($faqs as $index => $faq)
            <div class="col-lg-5 {{ $index % 2 == 0 ? 'offset-lg-1' : '' }}">
                <div>
                    <div class="faq-question-q-box">Q.</div>
                    <h4 class="faq-question text-body">{{ $faq->question }}</h4>
                    <p class="faq-answer mb-4 pb-1 text-muted">{{ $faq->answer }}</p>
                </div>
            </div>
            <!--/col-lg-5 -->
            @endforeach
        </div>
        <!-- end row -->
    </div> <!-- end container-->
</section>
<!-- END FAQ -->

<!-- START CONTACT -->
<section class="py-5 bg-light-lighten border-top border-bottom border-light" id="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h3>{{$configuration->contact_title}}</h3>
                    <p class="text-muted mt-2">
                        {{$configuration->contact_subtitle}}
                    </p>
                </div>
            </div>
        </div>

        <div class="row align-items-center mt-3">
            <div class="col-md-4">
                <p class="text-muted"><span class="fw-bold">Dukungan Pelanggan:</span><br> <span
                        class="d-block mt-1">{{$configuration->no_hp}}</span></p>
                <p class="text-muted mt-4"><span class="fw-bold">Alamat Email:</span><br> <span
                        class="d-block mt-1">{{$configuration->email}}</span></p>
                <p class="text-muted mt-4"><span class="fw-bold">Alamat Kantor:</span><br> <span
                        class="d-block mt-1">{{$configuration->alamat_teks}}</span></p>
            </div>

            <div class="col-md-8">

                <form action="{{ route('contact.send') }}" method="POST">
                    @if(session('success'))
                    <script>
                        Swal.fire({
                            title: 'Sukses!',
                            text: '{{ session('success') }}',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });
                    </script>
                    @endif
                    @csrf
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="fullname" class="form-label">Nama Anda</label>
                                <input class="form-control form-control-light" type="text" name="fullname" id="fullname"
                                    placeholder="Nama..." required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="emailaddress" class="form-label">Email Anda</label>
                                <input class="form-control form-control-light" type="email" name="email"
                                    id="emailaddress" placeholder="Masukkan email Anda..." required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-12">
                            <div class="mb-2">
                                <label for="subject" class="form-label">Subjek</label>
                                <input class="form-control form-control-light" type="text" name="subject" id="subject"
                                    placeholder="Masukkan subjek..." required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-12">
                            <div class="mb-2">
                                <label for="comments" class="form-label">Pesan</label>
                                <textarea id="comments" name="comments" rows="4" class="form-control form-control-light"
                                    placeholder="Ketik pesan Anda di sini..." required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12 text-end">
                            <button class="btn btn-primary" type="submit">Kirim Pesan <i
                                    class="mdi mdi-telegram ms-1"></i></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<!-- END CONTACT -->

@endsection

@section('styles')
<!-- Tambahkan style ini -->
<style>
    #view-umkm-btn {
        transition: all 0.3s ease;
        background-color: #007bff;
        color: white;
    }

    #view-umkm-btn:hover {
        background-color: #0056b3;
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.5);
    }

    #view-umkm-btn.btn-clicked {
        animation: clickEffect 0.3s ease-in-out;
    }

    @keyframes clickEffect {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(0.95);
        }

        100% {
            transform: scale(1);
        }
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('view-umkm-btn').addEventListener('click', function() {
        this.classList.add('btn-clicked');
        setTimeout(() => {
            this.classList.remove('btn-clicked');
        }, 300); // Durasi animasi
    });
</script>
@if(session('success'))
<script>
    Swal.fire({
        title: 'Sukses!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'Ok'
    });
</script>
@endif
@endsection