@extends('layouts.register')

@section('content')
<section class="hero">
    <div class="m-auto mt-5" style="width: 90%">
        <div class="card d-flex flex-row shadow-sm">
            <div class="card-body">
                <a href="#" onclick="return confirmClose()">
                    <button type="button" class="btn btn-danger position-absolute top-0 end-0 m-2">
                        <i class="mdi mdi-window-close"></i>
                    </button>
                </a>
                <h3 class="h3 mb-3">Register Your UMKM</h3>
                <div id="bar" class="progress mb-3" style="height: 7px;">
                    <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-primary"></div>
                </div>
                <div class="d-flex flex-row shadow-sm p-2 rounded">
                    <div class="sidebar-step-container row">
                        <!-- Sidebar navigation -->
                        <div class="mb-2 mb-sm-0">
                            <div class="nav flex-column nav-pills p-1 me-3" id="form-steps-nav" role="tablist"
                                aria-orientation="vertical">
                                <!-- Step 1 -->
                                <a class="nav-link nav-tabs active" id="form-step-1-tab" data-bs-toggle="pill"
                                    href="#form-step-1" role="tab" aria-controls="form-step-1" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="step-number rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                            style="width: 30px; height: 30px;">1</div>
                                        <span class="fw-bold d-md-block ms-2">Register Account</span>
                                    </div>
                                </a>
                                <div id="divider-1" class="divider d-none">
                                    <div class="line bg-secondary mx-auto" style="width: 2px; height: 40px;"></div>
                                </div>
                                <!-- Step 2 -->
                                <a class="nav-link nav-tabs" id="form-step-2-tab" data-bs-toggle="pill"
                                    href="#form-step-2" role="tab" aria-controls="form-step-2" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="step-number rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                            style="width: 30px; height: 30px;">2</div>
                                        <span class="fw-bold d-md-block ms-2">Personal Data</span>
                                    </div>
                                </a>
                                <div id="divider-2" class="divider d-none">
                                    <div class="line bg-secondary mx-auto" style="width: 2px; height: 40px;"></div>
                                </div>
                                <!-- Step 3 -->
                                <a class="nav-link nav-tabs" id="form-step-3-tab" data-bs-toggle="pill"
                                    href="#form-step-3" role="tab" aria-controls="form-step-3" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="step-number rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                            style="width: 30px; height: 30px;">3</div>
                                        <span class="fw-bold d-md-block ms-2">Data Usaha/UMKM</span>
                                    </div>
                                </a>
                                <div id="divider-3" class="divider d-none">
                                    <div class="line bg-secondary mx-auto" style="width: 2px; height: 40px;"></div>
                                </div>
                                <!-- Step 4 -->
                                <a class="nav-link nav-tabs" id="form-step-4-tab" data-bs-toggle="pill"
                                    href="#form-step-4" role="tab" aria-controls="form-step-4" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="step-number rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                            style="width: 30px; height: 30px;">4</div>
                                        <span class="fw-bold d-md-block ms-2"><i
                                                class="mdi mdi-checkbox-marked-circle-outline me-1"></i> Finish</span>
                                    </div>
                                </a>
                            </div>
                        </div> <!-- end col-->
                    </div>


                    <div class="form-step-container flex-grow-1" id="form-steps-tabContent">
                        <!-- Form Step 1 -->
                        <div id="form-step-1"
                            class="tab-pane form-step fade border border-primary rounded shadow-lg p-3 show active"
                            role="tabpanel" aria-labelledby="form-step-1-tab">
                            <form id="accountForm" class="needs-validation" novalidate>
                                <h3>Register Account</h3>
                                <hr class="mb-3">
                                <div class="row mb-3">
                                    <label for="name" class="col-3 col-form-label">Username</label>
                                    <div class="col-9">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Username" required>
                                        <div class="invalid-feedback">Please provide a valid name.</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-3 col-form-label">Email</label>
                                    <div class="col-9">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Email" required>
                                        <div class="invalid-feedback">Please provide a valid email.</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-3 col-form-label">Password</label>
                                    <div class="col-9">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password_confirmation" class="col-3 col-form-label">Confirm
                                        Password</label>
                                    <div class="col-9">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" required>
                                        <div class="error-password-confirmation invalid-feedback">Confirm Your Password.
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev" type="button" disabled>Previous</button>
                                    <button class="btn btn-primary btn-next" type="button">Next</button>
                                </div>
                            </form>
                        </div>

                        <!-- Form Step 2 -->
                        <div id="form-step-2"
                            class="tab-pane form-step fade border border-primary rounded shadow-lg p-3 d-none"
                            role="tabpanel" aria-labelledby="form-step-2-tab">
                            <form id="profileForm" class="needs-validation" novalidate>
                                <h2 class="mb-3">Personal Data</h2>
                                <!-- Full Name -->
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        placeholder="Enter your full name" required>
                                    <small class="form-text text-muted">Please provide your full legal name.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK (National Identity Number)</label>
                                    <input type="text" class="form-control" id="nik" name="nik"
                                        placeholder="Enter your NIK" required>
                                    <small class="form-text text-muted">Your 16-digit National Identity
                                        Number.</small>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <label for="tempat_lahir" class="form-label">Place of Birth</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                            placeholder="Enter your place of birth" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="tanggal_lahir" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                            placeholder="Enter your date of birth" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Gender</label>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="Laki-laki">Male</option>
                                        <option value="Perempuan">Female</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nomor_telepon" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon"
                                        placeholder="Enter your phone number" required>
                                </div>
                                <!-- Province, City, District, and Sub-district grouped in one row -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="provinsi_id" class="form-label">Province</label>
                                        <select class="form-select" id="provinsi_id" name="provinsi_id" required>
                                            <option value="" disabled selected>Select Province</option>
                                            @foreach($provinsis as $provinsi)
                                            <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="kabupaten_kota_id" class="form-label">City</label>
                                        <select class="form-select" id="kabupaten_kota_id" name="kabupaten_kota_id"
                                            required>
                                            <option value="" disabled selected>Select City</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="kecamatan_id" class="form-label">District</label>
                                        <select class="form-select" id="kecamatan_id" name="kecamatan_id" required>
                                            <option value="" disabled selected>Select District</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="kelurahan_id" class="form-label">Sub-district</label>
                                        <select class="form-select" id="kelurahan_id" name="kelurahan_id" required>
                                            <option value="" disabled selected>Select Sub-district</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Address</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="2"
                                        placeholder="Enter your full address" required></textarea>
                                </div>

                                <!-- Navigation buttons -->
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev" type="button">Previous</button>
                                    <button class="btn btn-primary btn-next" type="button">Next</button>
                                </div>
                            </form>
                        </div>

                        <!-- Form Step 3 -->
                        <div id="form-step-3"
                            class="tab-pane form-step fade border border-primary rounded shadow-lg p-3 d-none"
                            role="tabpanel" aria-labelledby="form-step-3-tab">
                            <h3>Business Information</h3>
                            <form id="umkmForm" class="needs-validation" novalidate>
                                <div class="mb-3">
                                    <label for="nama_usaha" class="form-label">Business Name</label>
                                    <input type="text" class="form-control" id="nama_usaha" name="nama_usaha"
                                        placeholder="Enter your business name" required>
                                    <small class="form-text text-muted">Please provide your business's official
                                        name.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="nib" class="form-label">NIB (Optional)</label>
                                    <input type="text" class="form-control" id="nib" name="nib"
                                        placeholder="Enter NIB if available">
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi_usaha" class="form-label">Business Description</label>
                                    <textarea class="form-control" id="deskripsi_usaha" name="deskripsi_usaha" rows="3"
                                        placeholder="Describe your business" required></textarea>
                                    <small class="form-text text-muted">Provide a brief description of your
                                        business.</small>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="umkm_category_id" class="form-label">Business Category</label>
                                        <select class="form-select" id="umkm_category_id" name="umkm_category_id" required>
                                            <option value="" disabled selected>Select Business Category</option>
                                            @foreach($umkmCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="tanggal_berdiri" class="form-label">Establishment Date</label>
                                        <input type="date" class="form-control" id="tanggal_berdiri"
                                            name="tanggal_berdiri" required>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <h4 class="mb-2">Business Locations</h4>
                                <div class="row">
                                    <div class="col-md mb-3">
                                        <label for="provinsi_id" class="form-label">Province</label>
                                        <select class="form-select" id="umkm_provinsi_id" name="provinsi_id" required>
                                            <option value="" disabled selected>Select Province</option>
                                            @foreach($provinsis as $provinsi)
                                            <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="umkm_kabupaten_kota_id" class="form-label">Regency/City</label>
                                        <select class="form-select" id="umkm_kabupaten_kota_id" name="kabupaten_kota_id"
                                            required>
                                            <option value="" disabled selected>Select Regency/City</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md mb-3">
                                        <label for="umkm_kecamatan_id" class="form-label">District</label>
                                        <select class="form-select" id="umkm_kecamatan_id" name="kecamatan_id" required>
                                            <option value="" disabled selected>Select District</option>
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="umkm_kelurahan_id" class="form-label">Subdistrict</label>
                                        <select class="form-select" id="umkm_kelurahan_id" name="kelurahan_id" required>
                                            <option value="" disabled selected>Select Subdistrict</option>
                                        </select>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="rt" class="form-label">RT</label>
                                        <input type="text" class="form-control" id="rt" name="rt" placeholder="Enter RT"
                                            maxlength="5" required>
                                    </div>
                                    <div class="col-md mb-3">
                                        <label for="rw" class="form-label">RW</label>
                                        <input type="text" class="form-control" id="rw" name="rw" placeholder="Enter RW"
                                            maxlength="5" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_usaha" class="form-label">Business Address</label>
                                    <textarea class="form-control" id="alamat_usaha" name="alamat_usaha"
                                        placeholder="Enter your business address" maxlength="100" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="koordinat_usaha" class="form-label">Business Coordinates (Google
                                        Maps)</label>
                                    <input type="text" class="form-control" id="kordinat_usaha" name="kordinat_usaha"
                                        placeholder="Paste Google Maps link here" required>
                                </div>

                                <hr class="my-3">

                                <!-- Financial Data -->
                                <h4>Financial Data</h4>
                                <div class="mb-3">
                                    <label for="modal_usaha" class="form-label">Business Capital</label>
                                    <input type="number" class="form-control" id="modal_usaha" name="modal_usaha"
                                        placeholder="Enter your business capital" min="0" max="99999999999999.99"
                                        step="0.01" required>
                                </div>

                                <div class="mb-3">
                                    <label for="asset_usaha" class="form-label">Business Assets</label>
                                    <input type="number" class="form-control" id="asset_usaha" name="asset_usaha"
                                        placeholder="Enter your business assets" min="0" max="99999999999999.99"
                                        step="0.01" required>
                                </div>

                                <div class="mb-3">
                                    <label for="penghasilan_bulanan" class="form-label">Monthly Income</label>
                                    <input type="number" class="form-control" id="penghasilan_bulanan"
                                        name="penghasilan_bulanan" placeholder="Enter your monthly income" min="0"
                                        max="99999999999999.99" step="0.01" required>
                                </div>

                                <div class="mb-3">
                                    <label for="penghasilan_tahunan" class="form-label">Annual Income</label>
                                    <input type="number" class="form-control" id="penghasilan_tahunan"
                                        name="penghasilan_tahunan" placeholder="Enter your annual income" min="0"
                                        max="99999999999999.99" step="0.01" required>
                                </div>

                                <div class="mb-3">
                                    <label for="jumlah_tenaga_kerja" class="form-label">Number of Employees</label>
                                    <input type="number" class="form-control" id="jumlah_tenaga_kerja"
                                        name="jumlah_tenaga_kerja" placeholder="Enter the number of employees" min="0"
                                        required>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev" type="button">Previous</button>
                                    <button class="btn btn-primary btn-next" type="button">Next</button>
                                </div>
                            </form>
                        </div>


                        <!-- Form Step 4: Submit -->
                        <div id="form-step-4"
                            class="tab-pane form-step fade border border-primary rounded shadow-lg p-3 d-none"
                            role="tabpanel" aria-labelledby="form-step-4-tab">
                            <form id="finalForm" class="needs-validation" novalidate>
                                <div class="text-center">
                                    <h2 class="mt-0">
                                        <i class="mdi mdi-check-all"></i>
                                    </h2>
                                    <h3 class="mt-0">Thank you !</h3>

                                    <p class="mb-2">Anda telah berhasil melengkapi data UMKM Anda. Data yang Anda masukkan akan digunakan untuk proses verifikasi dan pendaftaran UMKM di sistem kami. Silahkan pastikan semua informasi yang telah Anda isi benar dan akurat.</p>

                                    <div class="mb-3">
                                        <div class="form-check d-inline-block mb-3">
                                            <input type="checkbox" class="form-check-input" id="agree" required>
                                            <label class="form-check-label" for="agree">I agree with the terms and
                                                conditions</label>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
                                    </div>

                                </div>

                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev" type="button">Back to Form</button>
                                    <button class="btn btn-success btn-next" type="button">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmClose() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to close this?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, close it!'
        }).then((result) => {
            if (result.isConfirmed) {
                    window.location.href = "{{ route('home') }}";
            }
        });
        return false;
    }
</script>
<script>
    $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let currentStep = 1;
    let isDropdownSetup = false;  
    let isDropdownSetupforUmkm =  false;



    // Event ketika tombol next diklik
    function validateCurrentForm(step) {
        let form = $('#form-step-' + step + ' form')[0]; // Ambil elemen form berdasarkan step

        form.classList.remove('was-validated'); 

        // Periksa validitas form
        if (form.checkValidity() === false) {
            form.classList.add('was-validated');
            return false;
        } else {
            form.classList.remove('was-validated');
            $.ajax({
                type: 'POST',
                url: `/check-step-${step}`,
                data: $(form).serialize(),
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: `Step ${step} completed!`,
                        timer: 1500,
                        showConfirmButton: false
                    });
                    changeStep(currentStep + 1);
                },
                error: function (response) {
                    handleValidationErrors(response, `#form-step-${step} form`);
                }
            });
            return true;
        }
    }

    // Fungsi setup dropdown dinamis lokasi
    function setupDynamicDropdown(provinsiField, kabupatenField, kecamatanField, kelurahanField) {
        const $provinsiSelect = $(`select[name="${provinsiField}"]`);
        const $kabupatenKotaSelect = $(`select[name="${kabupatenField}"]`);
        const $kecamatanSelect = $(`select[name="${kecamatanField}"]`);
        const $kelurahanSelect = $(`select[name="${kelurahanField}"]`);


        // Handle change event untuk Provinsi
        $provinsiSelect.on('change', function() {
            const provinsiId = $(this).val();
            if (provinsiId) {
                $.ajax({
                    url: `/get-locations/provinsi/${provinsiId}`,
                    type: 'GET',
                    success: function(data) {
                        $kabupatenKotaSelect.empty();
                        $kabupatenKotaSelect.append('<option value="" disabled selected>Select City</option>');
                        $.each(data, function(key, value) {
                            $kabupatenKotaSelect.append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                        });
                    }
                });
            } else {
                $kabupatenKotaSelect.empty();
            }
        });

        // Handle change event untuk Kabupaten/Kota
        $kabupatenKotaSelect.on('change', function() {
            const kabupatenKotaId = $(this).val();
            if (kabupatenKotaId) {
                $.ajax({
                    url: `/get-locations/kabupaten_kota/${kabupatenKotaId}`,
                    type: 'GET',
                    success: function(data) {
                        $kecamatanSelect.empty();
                        $kecamatanSelect.append('<option value="" disabled selected>Select District</option>');
                        $.each(data, function(key, value) {
                            $kecamatanSelect.append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                        });
                    }
                });
            } else {
                $kecamatanSelect.empty();
            }
        });

        // Handle change event untuk Kecamatan
        $kecamatanSelect.on('change', function() {
            const kecamatanId = $(this).val();
            if (kecamatanId) {
                $.ajax({
                    url: `/get-locations/kecamatan/${kecamatanId}`,
                    type: 'GET',
                    success: function(data) {
                        $kelurahanSelect.empty();
                        $kelurahanSelect.append('<option value="" disabled selected>Select Sub-district</option>');
                        $.each(data, function(key, value) {
                            $kelurahanSelect.append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                        });
                    }
                });
            } else {
                $kelurahanSelect.empty();
            }
        });
    }

    // Function untuk melakukan finish registration
    function finishRegistration() {
        $.ajax({
            type: 'POST',
            url: '/register/finish',
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registration Completed!',
                        text: 'Your registration has been successfully submitted.',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = '/register/success';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message || 'There was a problem with your registration. Please try again.'
                    });
                }
            },
            error: function (response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred during registration. Please try again.'
                });
            }
        });
    }

    // Function untuk mengambil data lokasi berdasarkan ID
    function changeStep(step) {
        // Update progress bar
        const total = 4; // Total langkah yang ada

        if (step > 1) { // Hanya memperbarui progress mulai dari step 2
            var percent = ((step - 1) / (total - 1)) * 100; // Menghitung progress
            $("#bar .bar").css({ width: percent + "%" }); // Update progress bar
        } else {
            $("#bar .bar").css({ width: "0%" }); // Step 1, progress bar tetap kosong
        }

        if (step >= 1 && step <= 4) {
            $('.form-step').addClass('d-none');
            $('#form-step-' + step).removeClass('d-none');

            $('.nav-link').removeClass('active');
            $('#form-step-' + step + '-tab').addClass('active');
            
            $('.tab-pane').removeClass('show active');
            $('#form-step-' + step).addClass('show active');

            $('.step-number').removeClass('bg-primary').addClass('bg-secondary')
            $('#form-step-' + step + '-tab').removeClass('bg-primary text-white');
            $('#divider-' + step).addClass('d-none');

            // Ubah warna step yang sudah dilewati
            for (let i = 1; i < step; i++) {
                $('#form-step-' + i + '-tab .step-number').removeClass('bg-secondary').addClass('bg-primary');
                $('#form-step-' + i + '-tab').addClass('bg-primary text-white');
                $('#divider-' + i).removeClass('d-none');
            }
            

            currentStep = step; 

            // Panggil setupDynamicDropdown hanya di Step 2 dan hanya sekali
            if (step === 2 && !isDropdownSetup) {
                setupDynamicDropdown('provinsi_id', 'kabupaten_kota_id', 'kecamatan_id', 'kelurahan_id');
                isDropdownSetup = true;
            }

            // Panggil setupDynamicDropdown hanya di Step 2 dan hanya sekali
            if (step === 3 && !isDropdownSetupforUmkm) {
                setupDynamicDropdown('umkm_provinsi_id', 'umkm_kabupaten_kota_id', 'umkm_kecamatan_id', 'umkm_kelurahan_id');
                isDropdownSetupforUmkm = true;
            }
        }
    }

    //Fungsi untuk tombol next/submit
    $('.btn-next').on('click', function () {
        if (currentStep === 4) {
            Swal.fire({
                title: 'Confirm Registration',
                text: 'Are you sure you want to complete the registration?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Register!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    finishRegistration();
                }
            });

        } else {
            validateCurrentForm(currentStep); 
        }
    });


    // Fungsi untuk Previous button
    $('.btn-prev').on('click', function () {
        changeStep(currentStep - 1);
        updateSidebarSteps(currentStep - 1);
    });

    // Fungsi untuk reset Error
    function resetErrors(formId) {
        $(formId).find('.is-invalid').removeClass('is-invalid'); // Remove invalid class from inputs
        $(formId).find('.error-text').text(''); // Clear any existing error messages

        // Clear specific error texts
        $(formId).find('.error-password-confirmation').text(''); // Clear password confirmation error
        $(formId).find('[class^="error-"]').text(''); // Clear all fields with error- class prefix
    }

    // Fungsi untuk error ajak validasi
    function handleValidationErrors(response, formId) {
        if (response.status === 422) {
            let errors = response.responseJSON.errors;
        
            resetErrors(formId);

            // Error pada email
            if (errors.email) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errors.email[0]
                });
                $(formId).find(`[name="email"]`).val('');
            }

            // Error pada nik
            if (errors.nik) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errors.nik[0]
                });
                $(formId).find(`[name="nik"]`).val('');
            }

            // Error pada konfirmasi password
            if (errors.password) {
                let passwordMessage = errors.password[0];
                $(formId).find(`[name="password_confirmation"]`).addClass('is-invalid');
                $(formId).find('.error-password-confirmation').text(passwordMessage);
                $(formId).find(`[name="password_confirmation"]`).val('');
            }

            // Menampilkan error di bawah masing-masing input
            for (let field in errors) {
                if (field !== 'email' && field !== 'password_confirmation' && field !== 'nik') {

                    let errorMessage = errors[field][0];
                    $(formId).find(`[name="${field}"]`).addClass('is-invalid');
                    $(formId).find(`[name="${field}"]`).val('');
                    $(formId).find(`.error-${field}`).text(errorMessage);
                }
            }
        } else {
            // Pesan error umum jika terjadi error selain validasi
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong, please try again later.'
            });
            return  false;
        }
    }

});
</script>
@endsection