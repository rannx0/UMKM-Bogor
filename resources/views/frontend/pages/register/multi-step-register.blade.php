@extends('layouts.register')

@section('content')
<section class="hero">
   <div class="m-auto mt-5" style="width: 90%">
      <div class="d-flex justify-content-center">
         <div class="col-md-12">
            <div class="card border-primary border shadow-lg w-100">
               <div class="card-body">
                  <h3 class="h3 mb-3">Register Your UMKM</h3>
                  <div id="bar" class="progress mb-3" style="height: 7px;">
                     <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-primary"></div>
                  </div>

                  <div>
                     <div id="rootwizard" class="d-flex flex-row">
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
                        <div class="flex-grow-1 d-flex flex-column shadow border rounded">
                           <div class="tab-content mb-0 p-3">
                              <div class="tab-pane fade" id="first">

                                 <!-- Form Account Login -->
                                 <form id="accountForm" method="post" action="#" class="form-horizontal">
                                    <div class="row">
                                       <div class="col-12">
                                          <div class="mb-3 row">
                                             <label class="col-md-2 col-form-label" for="userName">User Name</label>
                                             <div class="col-md-9">
                                                <input type="text" class="form-control" id="userName" name="username"
                                                   required>
                                                <div class="invalid-feedback">Username is required.</div>
                                                <!-- Pesan kesalahan -->
                                             </div>
                                          </div>
                                          <div class="mb-3 row">
                                             <label class="col-md-2 col-form-label" for="Email">Email</label>
                                             <div class="col-md-9">
                                                <input type="text" class="form-control" id="Email" name="email"
                                                   required>
                                                <div class="invalid-feedback">Email is required.</div>
                                                <!-- Pesan kesalahan -->
                                             </div>
                                          </div>
                                          <div class="mb-3 row">
                                             <label class="col-md-2 col-form-label" for="password">Password</label>
                                             <div class="col-md-9">
                                                <div class="input-group input-group-merge">

                                                   <input type="password" class="form-control" id="password"
                                                      name="password" required>
                                                   <div class="input-group-text" data-password="false">
                                                      <span class="password-eye"></span>
                                                   </div>
                                                </div>
                                                <div class="invalid-feedback">Password is required.</div>
                                                <!-- Pesan kesalahan -->
                                             </div>
                                          </div>
                                          <div class="mb-3 row">
                                             <label class="col-md-2 col-form-label" for="confirmPassword">Confirm
                                                Password</label>
                                             <div class="col-md-9">
                                                <input type="password" class="form-control" id="confirmPassword"
                                                   name="confirmPassword" required>
                                                <div class="invalid-feedback">Please confirm your password.</div>
                                                <!-- Pesan kesalahan -->
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>

                              <!-- Form Personal Data -->
                              <div class="tab-pane fade" id="second">
                                 <form id="profileForm" method="post" action="#" class="form-horizontal">
                                    <h2>Data Pribadi</h2>

                                    <div class="mb-3">
                                       <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                       <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                          required>
                                       <div class="invalid-feedback">Silakan masukkan nama lengkap Anda.</div>
                                    </div>

                                    <div class="mb-3">
                                       <label for="nik" class="form-label">NIK</label>
                                       <input type="text" class="form-control" id="nik" name="nik" required>
                                       <div class="invalid-feedback">Silakan masukkan NIK Anda.</div>
                                    </div>

                                    <div class="mb-3">
                                       <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                       <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                          required>
                                       <div class="invalid-feedback">Silakan masukkan tempat lahir Anda.</div>
                                    </div>

                                    <div class="mb-3">
                                       <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                       <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                          required>
                                       <div class="invalid-feedback">Silakan masukkan tanggal lahir Anda.</div>
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
                                          required>
                                       <div class="invalid-feedback">Silakan masukkan nomor telepon Anda.</div>
                                    </div>

                                    <div class="mb-3">
                                       <label for="provinsi_id" class="form-label">Provinsi</label>
                                       <select class="form-select" id="provinsi_id" name="provinsi_id" required>
                                          <!-- Tambahkan pilihan provinsi di sini -->
                                       </select>
                                    </div>

                                    <div class="mb-3">
                                       <label for="kabupaten_kota_id" class="form-label">Kabupaten/Kota</label>
                                       <select class="form-select" id="kabupaten_kota_id" name="kabupaten_kota_id"
                                          required>
                                          <!-- Tambahkan pilihan kabupaten/kota di sini -->
                                       </select>
                                    </div>

                                    <div class="mb-3">
                                       <label for="kecamatan_id" class="form-label">Kecamatan</label>
                                       <select class="form-select" id="kecamatan_id" name="kecamatan_id" required>
                                          <!-- Tambahkan pilihan kecamatan di sini -->
                                       </select>
                                    </div>

                                    <div class="mb-3">
                                       <label for="kelurahan_id" class="form-label">Kelurahan</label>
                                       <select class="form-select" id="kelurahan_id" name="kelurahan_id" required>
                                          <!-- Tambahkan pilihan kelurahan di sini -->
                                       </select>
                                    </div>

                                    <div class="mb-3">
                                       <label for="alamat" class="form-label">Alamat</label>
                                       <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                                    </div>
                                 </form>
                              </div>

                              <!-- Form Usaha & Keuangan -->
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
                                          <option value="">Pilih Kategori</option>
                                          <option value="kategori1">Kategori 1</option>
                                          <option value="kategori2">Kategori 2</option>
                                          <!-- Tambahkan kategori lainnya sesuai kebutuhan -->
                                       </select>
                                    </div>
                                    <div class="mb-3">
                                       <label for="tanggal_berdiri" class="form-label">Tanggal Berdiri</label>
                                       <input type="date" class="form-control" id="tanggal_berdiri"
                                          name="tanggal_berdiri" required>
                                    </div>
                                    <div class="mb-3">
                                       <label for="alamat_usaha" class="form-label">Alamat Usaha</label>
                                       <input type="text" class="form-control" id="alamat_usaha" name="alamat_usaha"
                                          required>
                                    </div>
                                    <div class="mb-3">
                                       <label for="kabupaten_kota_id" class="form-label">Kabupaten/Kota</label>
                                       <select class="form-select" id="kabupaten_kota_id" name="kabupaten_kota_id"
                                          required>
                                          <option value="">Pilih Kabupaten/Kota</option>
                                          <option value="kota1">Kota 1</option>
                                          <option value="kota2">Kota 2</option>
                                          <!-- Tambahkan pilihan kabupaten/kota di sini -->
                                       </select>
                                    </div>
                                    <div class="mb-3">
                                       <label for="koordinat_usaha" class="form-label">Koordinat Usaha (Google
                                          Maps)</label>
                                       <input type="text" class="form-control" id="koordinat_usaha"
                                          name="koordinat_usaha" required>
                                    </div>
                                    <div class="mb-3">
                                       <label for="rt_rw" class="form-label">RT/RW</label>
                                       <input type="text" class="form-control" id="rt_rw" name="rt_rw" required>
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

@section('scripts')
<script>
   $(document).ready(function() {
      "use strict";

      $("#rootwizard").on('show.bs.tab', function(e) {
         $(e.target).addClass('fade show');
      });
      // Initialize the wizard with BootstrapWizard
      $("#rootwizard").bootstrapWizard({
         // onNext: function(tab, navigation, index) {
         //    var form = $($(tab).data("target-form"));
         //    if (form && (form.addClass("was-validated"), !form[0].checkValidity())) {
         //       event.preventDefault();
         //       event.stopPropagation();

         //       // Menampilkan pesan kesalahan
         //       form.find(':input:invalid').each(function() {
         //          $(this).addClass('is-invalid'); // Tambahkan kelas invalid
         //       });
         //       return false;
         //    }
         // },
         onTabShow: function(tab, navigation, index) {
            var total = navigation.find("li.step").length;
            var current = index + 1;
            var percent = (current / total) * 100;
            $("#bar .bar").css({ width: percent + "%" }); // Update progress bar

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