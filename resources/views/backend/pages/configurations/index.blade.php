@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>Konfigurasi</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('configuration.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Input hidden untuk ID -->
        <input type="hidden" name="id" value="{{ old('id', $configuration->id ?? '') }}">

        <!-- Nama Instansi -->
        <div class="mb-3">
            <label for="name_instansi" class="form-label">Nama Instansi</label>
            <input type="text" name="name_instansi" id="name_instansi" class="form-control"
                value="{{ old('name_instansi', $configuration->name_instansi) }}">
        </div>

        <!-- Footer Name -->
        <div class="mb-3">
            <label for="footer_name" class="form-label">Footer</label>
            <input type="text" name="footer_name" id="footer_name" class="form-control"
                value="{{ old('footer_name', $configuration->footer_name) }}">
        </div>

        <div class="d-flex gap-4">
            <!-- Logo -->
            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" name="logo" id="logo" class="form-control">
                @if($configuration->logo)
                <img src="{{ asset('storage/configuration/' . $configuration->logo) }}" alt="Logo"
                    class="img-thumbnail mt-2" width="150">
                @endif
            </div>

            <!-- Favicon -->
            <div class="mb-3">
                <label for="favicon" class="form-label">Favicon</label>
                <input type="file" name="favicon" id="favicon" class="form-control">
                @if($configuration->favicon)
                <img src="{{ asset('storage/configuration/' . $configuration->favicon) }}" alt="Favicon"
                    class="img-thumbnail mt-2" width="100">
                @endif
            </div>
        </div>

        <!-- Nomor HP -->
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control"
                value="{{ old('no_hp', $configuration->no_hp) }}">
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control"
                value="{{ old('email', $configuration->email) }}">
        </div>

        <!-- Alamat Teks -->
        <div class="mb-3">
            <label for="alamat_teks" class="form-label">Alamat Teks</label>
            <textarea name="alamat_teks" id="alamat_teks"
                class="form-control">{{ old('alamat_teks', $configuration->alamat_teks) }}</textarea>
        </div>

        <!-- Gmaps Iframe -->
        <div class="mb-3">
            <label for="gmaps_iframe" class="form-label">Google Maps Iframe</label>
            <textarea name="gmaps_iframe" id="gmaps_iframe"
                class="form-control">{{ old('gmaps_iframe', $configuration->gmaps_iframe) }}</textarea>
        </div>

        <!-- Deskripsi Footer -->
        <div class="mb-3">
            <label for="deskripsi_footer" class="form-label">Deskripsi Singkat Footer</label>
            <textarea name="deskripsi_footer" id="deskripsi_footer"
                class="form-control">{{ old('deskripsi_footer', $configuration->deskripsi_footer) }}</textarea>
        </div>

        <!-- UMKM Title -->
        <div class="mb-3">
            <label for="umkm_title" class="form-label">UMKM Title</label>
            <input type="text" name="umkm_title" id="umkm_title" class="form-control"
                value="{{ old('umkm_title', $configuration->umkm_title) }}">
        </div>

        <!-- UMKM Subtitle -->
        <div class="mb-3">
            <label for="umkm_subtitle" class="form-label">UMKM Subtitle</label>
            <input type="text" name="umkm_subtitle" id="umkm_subtitle" class="form-control"
                value="{{ old('umkm_subtitle', $configuration->umkm_subtitle) }}">
        </div>

        <!-- FAQ Title -->
        <div class="mb-3">
            <label for="faq_title" class="form-label">FAQ Title</label>
            <input type="text" name="faq_title" id="faq_title" class="form-control"
                value="{{ old('faq_title', $configuration->faq_title) }}">
        </div>

        <!-- FAQ Subtitle -->
        <div class="mb-3">
            <label for="faq_subtitle" class="form-label">FAQ Subtitle</label>
            <input type="text" name="faq_subtitle" id="faq_subtitle" class="form-control"
                value="{{ old('faq_subtitle', $configuration->faq_subtitle) }}">
        </div>

        <!-- Contact Title -->
        <div class="mb-3">
            <label for="contact_title" class="form-label">Contact Title</label>
            <input type="text" name="contact_title" id="contact_title" class="form-control"
                value="{{ old('contact_title', $configuration->contact_title) }}">
        </div>

        <!-- Contact Subtitle -->
        <div class="mb-3">
            <label for="contact_subtitle" class="form-label">Contact Subtitle</label>
            <input type="text" name="contact_subtitle" id="contact_subtitle" class="form-control"
                value="{{ old('contact_subtitle', $configuration->contact_subtitle) }}">
        </div>


        <div class="container">
            <div class="row g-3 mb-3">
                <!-- Instagram -->
                <div class="col-md-4 tilebox-one">
                    <div class="mb-1">
                        <label for="link_instagram" class="form-label">Instagram</label>
                        <input type="text" name="link_instagram" id="link_instagram" class="form-control"
                            value="{{ old('link_instagram', $configuration->link_instagram) }}">
                    </div>
                    <!-- Show Instagram -->
                    <div class="form-check">
                        <input type="hidden" name="show_instagram" value="0">
                        <input type="checkbox" name="show_instagram" id="show_instagram" class="form-check-input"
                            value="1" {{ old('show_instagram', $configuration->show_instagram) ? 'checked' : '' }}>
                        <label for="show_instagram" class="form-check-label">Tampilkan Instagram</label>
                    </div>
                </div>

                <!-- YouTube -->
                <div class="col-md-4">
                    <div class="mb-1">
                        <label for="link_youtube" class="form-label">YouTube</label>
                        <input type="text" name="link_youtube" id="link_youtube" class="form-control"
                            value="{{ old('link_youtube', $configuration->link_youtube) }}">
                    </div>
                    <!-- Show YouTube -->
                    <div class="form-check mb-1">
                        <input type="hidden" name="show_youtube" value="0">
                        <input type="checkbox" name="show_youtube" id="show_youtube" class="form-check-input" value="1"
                            {{ old('show_youtube', $configuration->show_youtube) ? 'checked' : '' }}>
                        <label for="show_youtube" class="form-check-label">Tampilkan YouTube</label>
                    </div>
                </div>

                <!-- Twitter -->
                <div class="col-md-4">
                    <div class="mb-1">
                        <label for="link_twitter" class="form-label">Twitter</label>
                        <input type="text" name="link_twitter" id="link_twitter" class="form-control"
                            value="{{ old('link_twitter', $configuration->link_twitter) }}">
                    </div>
                    <!-- Show Twitter -->
                    <div class="form-check mb-1">
                        <input type="hidden" name="show_twitter" value="0">
                        <input type="checkbox" name="show_twitter" id="show_twitter" class="form-check-input" value="1"
                            {{ old('show_twitter', $configuration->show_twitter) ? 'checked' : '' }}>
                        <label for="show_twitter" class="form-check-label">Tampilkan Twitter</label>
                    </div>
                </div>

                <!-- Facebook -->
                <div class="col-md-4">
                    <div class="mb-1">
                        <label for="link_facebook" class="form-label">Facebook</label>
                        <input type="text" name="link_facebook" id="link_facebook" class="form-control"
                            value="{{ old('link_facebook', $configuration->link_facebook) }}">
                    </div>
                    <!-- Show Facebook -->
                    <div class="form-check mb-1">
                        <input type="hidden" name="show_facebook" value="0">
                        <input type="checkbox" name="show_facebook" id="show_facebook" class="form-check-input"
                            value="1" {{ old('show_facebook', $configuration->show_facebook) ? 'checked' : '' }}>
                        <label for="show_facebook" class="form-check-label">Tampilkan Facebook</label>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="col-md-4">
                    <div class="mb-1">
                        <label for="link_whatsapp" class="form-label">WhatsApp</label>
                        <input type="text" name="link_whatsapp" id="link_whatsapp" class="form-control"
                            value="{{ old('link_whatsapp', $configuration->link_whatsapp) }}">
                    </div>
                    <!-- Show WhatsApp -->
                    <div class="form-check mb-1">
                        <input type="hidden" name="show_whatsapp" value="0">
                        <input type="checkbox" name="show_whatsapp" id="show_whatsapp" class="form-check-input"
                            value="1" {{ old('show_whatsapp', $configuration->show_whatsapp) ? 'checked' : '' }}>
                        <label for="show_whatsapp" class="form-check-label">Tampilkan WhatsApp</label>
                    </div>
                </div>
            </div>
        </div>




        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection