@extends('layouts.register')

@section('content')
<section class="hero">
   <div class="m-auto mt-5" style="width: 90%">
      <div class="d-flex justify-content-center">
         <div class="col-md-12">
            <div class="card border border-dark shadow-lg w-100">
               <div class="card-body">
                  <h3 class="h3 mb-3">Register Your UMKM</h3>
                  <div id="bar" class="progress mb-3" style="height: 7px;">
                     <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-primary"></div>
                  </div>

                  <div>
                     <div id="rootwizard" class="d-flex flex-row shadow-sm">
                        <!-- Sidebar navigation -->
                        <div class="d-flex flex-column align-items-start p-2 me-3">
                           <ul class="nav nav-pills nav-justified form-wizard flex-column mb-3">
                              <!-- Step 1: Login Account -->
                              <li class="nav-item step" data-target-form="#accountForm">
                                 <a href="#first" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link d-flex align-items-center text-start" style="pointer-events: none;">
                                    <div
                                       class="step-number rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                       style="width: 30px; height: 30px;">1</div>
                                    <div class="ms-2">
                                       <span class="title fw-bold">Login Account</span>
                                    </div>
                                 </a>
                              </li>
                              <!-- Divider -->
                              <li class="divider position-relative">
                                 <div class="line bg-primary mx-auto" style="width: 2px; height: 40px;"></div>
                              </li>
                              <!-- Step 2: Personal Data -->
                              <li class="nav-item step" data-target-form="#profileForm">
                                 <a href="#second" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link d-flex align-items-center text-start" style="pointer-events: none;">
                                    <div
                                       class="step-number rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                       style="width: 30px; height: 30px;">2</div>
                                    <div class="ms-2">
                                       <span class="title fw-bold">Personal Data</span>
                                    </div>
                                 </a>
                              </li>
                              <!-- Divider -->
                              <li class="divider position-relative">
                                 <div class="line bg-primary mx-auto" style="width: 2px; height: 40px;"></div>
                              </li>
                              <!-- Step 3: Data Usaha/UMKM -->
                              <li class="nav-item step" data-target-form="#umkmForm">
                                 <a href="#third" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link d-flex align-items-center text-start" style="pointer-events: none;">
                                    <div
                                       class="step-number rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                       style="width: 30px; height: 30px;">3</div>
                                    <div class="ms-2">
                                       <span class="title fw-bold">Data Usaha/UMKM</span>
                                    </div>
                                 </a>
                              </li>
                              <!-- Divider -->
                              <li class="divider position-relative">
                                 <div class="line bg-primary mx-auto" style="width: 2px; height: 40px;"></div>
                              </li>
                              <!-- Step 4: Finish -->
                              <li class="nav-item step" data-target-form="#otherForm">
                                 <a href="#fourth" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link d-flex align-items-center text-start" style="pointer-events: none;">
                                    <div
                                       class="step-number rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                       style="width: 30px; height: 30px;">4</div>
                                    <div class="ms-2">
                                       <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                       <span class="title fw-bold">Finish</span>
                                    </div>
                                 </a>
                              </li>
                           </ul>
                        </div>


                        <!-- Form content -->
                        <div class="flex-grow-1 d-flex flex-column">
                           <div class="tab-content mb-0 p-3 border border-primary rounded shadow-lg">
                              <!-- Form Step 1 Account Login -->
                              <div class="tab-pane fade" id="first">
                                 <form id="accountForm" method="POST" action="{{ route('register.step') }}"
                                    class="form-horizontal">
                                    @csrf
                                    <!-- Tambahkan CSRF token -->
                                    <div class="row">
                                       <div class="col-12">
                                          <div class="mb-3 row">
                                             <label class="col-md-2 col-form-label" for="userName">Username</label>
                                             <div class="col-md-9">
                                                <input type="text" class="form-control" id="userName" name="username"
                                                   placeholder="Enter Your Username" required>
                                                <div class="invalid-feedback">Username is required.</div>
                                             </div>
                                          </div>
                                          <div class="mb-3 row">
                                             <label class="col-md-2 col-form-label" for="Email">Email</label>
                                             <div class="col-md-9">
                                                <input type="email" class="form-control" id="Email" name="email"
                                                   placeholder="Enter Your Email" required>
                                                <div class="invalid-feedback">Email is required.</div>
                                             </div>
                                          </div>
                                          <div class="mb-3 row">
                                             <label class="col-md-2 col-form-label" for="password">Password</label>
                                             <div class="col-md-9">
                                                <div class="input-group input-group-merge">
                                                   <input type="password" class="form-control" id="password"
                                                      placeholder="Enter Your Password" name="password" required>
                                                   <div class="input-group-text" data-password="false">
                                                      <span class="password-eye"></span>
                                                   </div>
                                                   <div class="invalid-feedback">Password is required.</div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>


                              <!-- Form Step 2 Personal Data -->
                              <div class="tab-pane fade" id="second">
                                 <form id="profileForm" method="post" action="#" class="form-horizontal">
                                    @csrf
                                    <h2>Data Pribadi</h2>

                                    <div class="mb-3">
                                       <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                       <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                          required>
                                       <div class="invalid-feedback">Silakan masukkan nama lengkap Anda.</div>
                                    </div>

                                    <div class="mb-3">
                                       <label for="nik" class="form-label">NIK</label>
                                       <input type="number" class="form-control" id="nik" name="nik" maxlength="16"
                                          pattern="\d*"
                                          oninput="this.value = this.value.replace(/\D/g, '').slice(0, 16)" required>
                                       <div class="invalid-feedback">Silakan masukkan NIK Anda.</div>
                                    </div>

                                    <div class="row">
                                       <div class="col-md mb-3">
                                          <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                          <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                             required>
                                          <div class="invalid-feedback">Silakan masukkan tempat lahir Anda.</div>
                                       </div>

                                       <div class="col-md mb-3">
                                          <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                          <input type="date" class="form-control" id="tanggal_lahir"
                                             name="tanggal_lahir" required>
                                          <div class="invalid-feedback">Silakan masukkan tanggal lahir Anda.</div>
                                       </div>
                                    </div>

                                    <div class="mb-3">
                                       <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                       <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                          <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                          <option value="Laki-laki">Laki-laki</option>
                                          <option value="Perempuan">Perempuan</option>
                                       </select>
                                       <div class="invalid-feedback">Silakan pilih jenis kelamin Anda.</div>
                                    </div>

                                    <div class="mb-3">
                                       <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                       <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon"
                                          maxlength="15" required pattern="^[0-9]+$"
                                          title="Nomor telepon hanya boleh berisi angka"
                                          oninput="this.value = this.value.replace(/\D/g, '').slice(0, 15)">
                                       <div class="invalid-feedback">Silakan masukkan nomor telepon yang valid.</div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                       <div class="col-md mb-3">
                                          <label for="provinsi_id" class="form-label">Provinsi</label>
                                          <select class="form-select" id="provinsi_id" name="provinsi_id" required>
                                             <option value="" disabled selected>Pilih Provinsi</option>
                                             @foreach($provinsi as $prov)
                                             <option value="{{ $prov->id }}">{{ $prov->nama }}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                       <div class="col-md mb-3">
                                          <label for="kabupaten_kota_id" class="form-label">Kabupaten/Kota</label>
                                          <select class="form-select" id="kabupaten_kota_id" name="kabupaten_kota_id"
                                             required>
                                             <!-- buat dengan relasi berdasarkan provinsi -->
                                             <option value="" disabled selected>Pilih Kabupaten/Kota</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md mb-3">
                                          <label for="kecamatan_id" class="form-label">Kecamatan</label>
                                          <select class="form-select" id="kecamatan_id" name="kecamatan_id" required>
                                             <!-- buat dengan relasi berdasarkan kabupaten/kota -->
                                             <option value="" disabled selected>Pilih Kecamatan</option>
                                          </select>
                                       </div>
                                       <div class="col-md mb-3">
                                          <label for="kelurahan_id" class="form-label">Kelurahan</label>
                                          <select class="form-select" id="kelurahan_id" name="kelurahan_id" required>
                                             <!-- buat dengan relasi berdasarkan kecamatan -->
                                             <option value="" disabled selected>Pilih Kelurahan</option>
                                          </select>
                                       </div>
                                    </div>

                                    <div class="mb-3">
                                       <label for="alamat" class="form-label">Alamat</label>
                                       <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                                    </div>
                                 </form>
                              </div>

                              <!-- Form Step 3 Usaha & Keuangan -->
                              <div class="tab-pane fade" id="third">
                                 <form id="umkmForm" method="post" action="#" class="form-horizontal">
                                    <!-- UMKM Form content here -->
                                    <!-- Data Usaha -->
                                    <h4>Data Usaha</h4>
                                    <div class="mb-3">
                                       <label for="nama_usaha" class="form-label">Nama Usaha</label>
                                       <input type="text" class="form-control" id="nama_usaha" name="nama_usaha"
                                          required>
                                    </div>
                                    <div class="mb-3">
                                       <label for="nib" class="form-label">NIB (Opsional)</label>
                                       <input type="text" class="form-control" id="nib" name="nib">
                                    </div>
                                    <div class="mb-3">
                                       <label for="deskripsi_usaha" class="form-label">Deskripsi Usaha</label>
                                       <textarea class="form-control" id="deskripsi_usaha" name="deskripsi_usaha"
                                          rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                       <label for="kategori_umkm" class="form-label">Kategori UMKM</label>
                                       <select class="form-select" id="kategori_umkm" name="kategori_umkm" required>
                                          <option value="" disabled selected>Pilih Kategori UMKM</option>

                                          @foreach($umkmCategories as $category)
                                          <!-- Ambil data dari database -->
                                          <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                    <div class="mb-3">
                                       <label for="tanggal_berdiri" class="form-label">Tanggal Berdiri</label>
                                       <input type="date" class="form-control" id="tanggal_berdiri"
                                          name="tanggal_berdiri" required>
                                    </div>
                                    <div class="row">
                                       <div class="col-md mb-3">
                                          <label for="provinsi_id" class="form-label">Provinsi</label>
                                          <select class="form-select" id="provinsi_id" name="provinsi_id" required>
                                             <option value="" disabled selected>Pilih Provinsi</option>
                                             @foreach($provinsi as $prov)
                                             <option value="{{ $prov->id }}">{{ $prov->nama }}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                       <div class="col-md mb-3">
                                          <label for="kabupaten_kota_id" class="form-label">Kabupaten/Kota</label>
                                          <select class="form-select" id="kabupaten_kota_id" name="kabupaten_kota_id"
                                             required>
                                             <!-- buat dengan relasi berdasarkan provinsi -->
                                             <option value="" disabled selected>Pilih Kabupaten/Kota</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md mb-3">
                                          <label for="kecamatan_id" class="form-label">Kecamatan</label>
                                          <select class="form-select" id="kecamatan_id" name="kecamatan_id" required>
                                             <!-- buat dengan relasi berdasarkan kabupaten/kota -->
                                             <option value="" disabled selected>Pilih Kecamatan</option>
                                          </select>
                                       </div>
                                       <div class="col-md mb-3">
                                          <label for="kelurahan_id" class="form-label">Kelurahan</label>
                                          <select class="form-select" id="kelurahan_id" name="kelurahan_id" required>
                                             <!-- buat dengan relasi berdasarkan kecamatan -->
                                             <option value="" disabled selected>Pilih Kelurahan</option>
                                          </select>
                                       </div>
                                       <div class="col-md mb3">
                                          <div class="mb-3">
                                             <label for="rt" class="form-label">RT</label>
                                             <input type="text" class="form-control" id="rt" name="rt" required>
                                          </div>
                                          <div class="mb-3">
                                             <label for="rw" class="form-label">RW</label>
                                             <input type="text" class="form-control" id="rw" name="rw" required>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="mb-3">
                                       <label for="alamat_usaha" class="form-label">Alamat Usaha</label>
                                       <input type="text" class="form-control" id="alamat_usaha" name="alamat_usaha"
                                          required>
                                    </div>
                                    <div class="mb-3">
                                       <label for="koordinat_usaha" class="form-label">Koordinat Usaha (Google
                                          Maps)</label>
                                       <input type="text" class="form-control" id="koordinat_usaha"
                                          name="koordinat_usaha" required>
                                    </div>
                                 </form>
                                 <hr class="my-3">

                                 <form method="post" action="#" class="form-horizontal">
                                    <!-- Data Keuangan -->
                                    <h4>Data Keuangan</h4>
                                    <div class="mb-3">
                                       <label for="modal_usaha" class="form-label">Modal Usaha</label>
                                       <input type="number" class="form-control" id="modal_usaha" name="modal_usaha"
                                          required>
                                    </div>
                                    <div class="mb-3">
                                       <label for="aset_usaha" class="form-label">Aset Usaha</label>
                                       <input type="number" class="form-control" id="aset_usaha" name="aset_usaha"
                                          required>
                                    </div>
                                    <div class="mb-3">
                                       <label for="penghasilan_bulanan" class="form-label">Penghasilan Bulanan</label>
                                       <input type="number" class="form-control" id="penghasilan_bulanan"
                                          name="penghasilan_bulanan" required>
                                    </div>
                                    <div class="mb-3">
                                       <label for="jumlah_tenaga_kerja" class="form-label">Jumlah Tenaga Kerja</label>
                                       <input type="number" class="form-control" id="jumlah_tenaga_kerja"
                                          name="jumlah_tenaga_kerja" required>
                                    </div>
                                 </form>
                              </div>

                              <!-- Submit -->
                              <div class="tab-pane fade" id="fourth">
                                 <form id="otherForm" method="post" action="#" class="form-horizontal">
                                    <div class="text-center">
                                       <h2 class="mt-0">
                                          <i class="mdi mdi-check-all"></i>
                                       </h2>
                                       <h3 class="mt-0">Thank you !</h3>

                                       <p class="w-75 mb-2 mx-auto">Quisque nec turpis at urna dictum luctus.
                                          Suspendisse convallis dignissim eros at volutpat. In egestas mattis
                                          dui. Aliquam mattis dictum aliquet.</p>

                                       <div class="mb-3">
                                          <div class="form-check d-inline-block">
                                             <input type="checkbox" class="form-check-input" id="customCheck4" required>
                                             <label class="form-check-label" for="customCheck4">I agree with the Terms
                                                and Conditions</label>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>

                              <!-- Navigation buttons -->
                              <div class="wizard d-flex justify-content-between mt-3 col-12">
                                 <button class="btn btn-info previous">Previous</button>
                                 <button class="btn btn-info next">Next</button>
                              </div>
                           </div>
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
g
@section('scripts')
<script>
   $(document).ready(function() {
      "use strict";

      $("#rootwizard").on('show.bs.tab', function(e) {
         $(e.target).addClass('fade show');
      });
      // Initialize the wizard with BootstrapWizard
      $("#rootwizard").bootstrapWizard({
         onNext: function(tab, navigation, index) {
            console.log('onNext called');
            console.log('index:', index);
            console.log('tab:', tab);
            console.log('navigation:', navigation);
            var form = $($(tab).data("target-form"));
            if (form && (form.addClass("was-validated"), !form[0].checkValidity())) {
               // Jika form tidak valid, maka tampilkan error
               form.find(':input:invalid').each(function() {
               $(this).addClass('is-invalid'); // Tambahkan kelas invalid
               });
               return false;
            } else {
               // Jika form valid, maka lanjutkan ke step berikutnya
               // Kirim data form via AJAX
               var step = index; // Step saat ini
               var formData = form.serialize() + '&step=' + step;

               $.ajax({
                  type: "POST",
                  url: form.attr('action'),
                  data: formData + '&step=' + step,
                  success: function(response) {
                     if (response.success) {
                        // Jika respons berhasil, lanjutkan ke step berikutnya
                        $("#rootwizard").bootstrapWizard('next');
                     } else {
                        // Jika respons gagal, tampilkan error
                        console.log('AJAX error');
                        console.log('response:', response);
                        // Tambahkan kode untuk menampilkan error di sini
                        return false;
                     }
                  },
                  error: function(response) {
                     console.log('AJAX error');
                     console.log('response:', response);
                     // Tambahkan kode untuk menampilkan error di sini
                     return false;
                  }
               });

               return true; // Lanjutkan ke step berikutnya
            }
            
         },
         onTabShow: function(tab, navigation, index) {
            var total = navigation.find("li.step").length;
            var current = index + 1; // Menghitung step saat ini (step dimulai dari 0)

            if (current > 1) { // Hanya memperbarui progress mulai dari step 2
               var percent = ((current - 1) / (total - 1)) * 100; // Menghitung progress mulai dari step 2
               $("#bar .bar").css({ width: percent + "%" }); // Update progress bar
            } else {
               $("#bar .bar").css({ width: "0%" }); // Step 1, progress bar tetap kosong
            }

            // Update sidebar steps
            navigation.find('li.step').each(function(i) {
               const $li = $(this);
               const $stepNumber = $li.find('.step-number');
               const $titleName = $li.find('.title');

               // Untuk langkah yang sudah diselesaikan
               if (i < index) {
                  $titleName.addClass('text-white');
                  $li.addClass('bg-primary rounded '); // Tandai langkah sebagai selesai
                  $stepNumber.removeClass('bg-secondary').addClass('bg-primary'); // Gunakan bg-success untuk yang telah selesai
               } 
               else {
                  $titleName.removeClass('text-white');
                  $li.removeClass('bg-primary'); // Reset kelas untuk langkah berikutnya
                  $stepNumber.removeClass('bg-success bg-primary').addClass('bg-secondary'); // Kembali ke bg-secondary untuk langkah yang belum diselesaikan
               }
            });

            navigation.find('li.divider').each(function(i) {
               // Aksi untuk setiap 'li.divider'
               const $li = $(this);
               
               // Jika divider berada sebelum langkah saat ini (sudah selesai)
               if (i < index) {
                  $li.removeClass('d-none'); // Tampilkan divider
               } 
               // Jika divider berada pada langkah yang belum selesai
               else {
                  $li.addClass('d-none'); // Sembunyikan divider
               }
            });

            // Disable 'Previous' button if on the first tab
            if (index === 0) {
               $('.previous').addClass('disabled').css('pointer-events', 'none');
            } else {
               $('.previous').removeClass('disabled').css('pointer-events', 'auto');
            }

            // Modify 'Next' button to 'Submit' on the last step
            if (index === total - 2) {
               $('.next').text('Submit').attr('type','submit');
            } else {
               $('.next').text('Next').removeAttr('type');
            }

            // Menyembunyikan tombol pada langkah terakhir
            if (index === total - 1) {
               $('.next').hide(); // Sembunyikan tombol "Next" pada langkah terakhir
               $('.previous').hide(); // Sembunyikan tombol "Previous" pada langkah terakhir
            } else {
               $('.next').show(); // Tampilkan tombol "Next" saat tidak di langkah terakhir
               $('.previous').show(); // Tampilkan tombol "Previous" saat tidak di langkah terakhir
            }

            // AJAX dropdowns hanya berfungsi pada step 3
            if (index === total - 3) {
               const $provinsiSelect = $('select[name="provinsi_id"]');
               const $kabupatenKotaSelect = $('select[name="kabupaten_kota_id"]');
               const $kecamatanSelect = $('select[name="kecamatan_id"]');
               const $kelurahanSelect = $('select[name="kelurahan_id"]');

               $provinsiSelect.on('change', function() {
                  const provinsiId = $(this).val();
                  if (provinsiId) {
                     $.ajax({
                     url: '/get-kabupaten-kota',
                     type: 'GET',
                     data: { provinsi_id: provinsiId },
                     dataType: 'json',
                     success: function(data) {
                        $kabupatenKotaSelect.empty();
                        $kabupatenKotaSelect.append('<option value="" disabled selected>Pilih Kabupaten/Kota</option>');
                        $.each(data, function(key, value) {
                           $kabupatenKotaSelect.append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                        });
                     }
                     });
                  } else {
                     $kabupatenKotaSelect.empty();
                  }
               });

               $kabupatenKotaSelect.on('change', function() {
                  const kabupatenKotaId = $(this).val();
                  if (kabupatenKotaId) {
                     $.ajax({
                     url: '/get-kecamatan',
                     type: 'GET',
                     data: { kabupaten_kota_id: kabupatenKotaId },
                     dataType: 'json',
                     success: function(data) {
                        $kecamatanSelect.empty();
                        $kecamatanSelect.append('<option value="" disabled selected>Pilih Kecamatan</option>');
                        $.each(data, function(key, value) {
                           $kecamatanSelect.append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                        });
                     }
                     });
                  } else {
                     $kecamatanSelect.empty();
                  }
               });

               $kecamatanSelect.on('change', function() {
                  const kecamatanId = $(this).val();
                  if (kecamatanId) {
                     $.ajax({
                     url: '/get-kelurahan',
                     type: 'GET',
                     data: { kecamatan_id: kecamatanId },
                     dataType: 'json',
                     success: function(data) {
                        $kelurahanSelect.empty();
                        $kelurahanSelect.append('<option value="" disabled selected>Pilih Kelurahan</option>');
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

            if (index === total - 4) {
               const $provinsiSelect = $('select[name="provinsi_id"]');
               const $kabupatenKotaSelect = $('select[name="kabupaten_kota_id"]');
               const $kecamatanSelect = $('select[name="kecamatan_id"]');
               const $kelurahanSelect = $('select[name="kelurahan_id"]');

               $provinsiSelect.on('change', function() {
                  const provinsiId = $(this).val();
                  if (provinsiId) {
                     $.ajax({
                     url: '/get-kabupaten-kota',
                     type: 'GET',
                     data: { provinsi_id: provinsiId },
                     dataType: 'json',
                     success: function(data) {
                        $kabupatenKotaSelect.empty();
                        $kabupatenKotaSelect.append('<option value="" disabled selected>Pilih Kabupaten/Kota</option>');
                        $.each(data, function(key, value) {
                           $kabupatenKotaSelect.append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                        });
                     }
                     });
                  } else {
                     $kabupatenKotaSelect.empty();
                  }
               });

               $kabupatenKotaSelect.on('change', function() {
                  const kabupatenKotaId = $(this).val();
                  if (kabupatenKotaId) {
                     $.ajax({
                     url: '/get-kecamatan',
                     type: 'GET',
                     data: { kabupaten_kota_id: kabupatenKotaId },
                     dataType: 'json',
                     success: function(data) {
                        $kecamatanSelect.empty();
                        $kecamatanSelect.append('<option value="" disabled selected>Pilih Kecamatan</option>');
                        $.each(data, function(key, value) {
                           $kecamatanSelect.append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                        });
                     }
                     });
                  } else {
                     $kecamatanSelect.empty();
                  }
               });

               $kecamatanSelect.on('change', function() {
                  const kecamatanId = $(this).val();
                  if (kecamatanId) {
                     $.ajax({
                     url: '/get-kelurahan',
                     type: 'GET',
                     data: { kecamatan_id: kecamatanId },
                     dataType: 'json',
                     success: function(data) {
                        $kelurahanSelect.empty();
                        $kelurahanSelect.append('<option value="" disabled selected>Pilih Kelurahan</option>');
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
         }
      });

      // Button navigation next
      $('.wizard .next').on('click', function(e) {
         e.preventDefault(); // Prevent default link action
         $("#rootwizard").bootstrapWizard('next'); // Move to the next step
      });

      // Button navigation previous
      $('.wizard .previous').on('click', function(e) {
         e.preventDefault(); // Prevent default link action
         $("#rootwizard").bootstrapWizard('previous'); // Move to the previous step
      });
   });
</script>
@endsection