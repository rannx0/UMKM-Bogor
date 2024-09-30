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