<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Add Patient</h4>

        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-8">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add New Patient</h5>
                </div>
                <div class="card-body text-center">
                    <?php Flasher::flash(); ?>
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/patients/createactive" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="first_name">First Name:</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="last_name">Last Name:</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="gender">Gender:</label><br>
                                    <label>Male</label>
                                    <input type="radio" name="gender" id="male" value="male" checked>
                                    <label>Female</label>
                                    <input type="radio" name="gender" id="female" value="female">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="date_of_birth" class="col-md-2 col-form-label">Date of Birth</label>
                                    <input class="form-control" type="date" value="2021-06-18" id="date_of_birth" name="date_of_birth">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="contact">Contact:</label>
                                <input type="text" class="form-control" id="contact" name="contact" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="address">Address:</label>
                                <textarea class="form-control" id="address" name="address" required></textarea><br>
                            </div>
                            <?php Flasher::flash(); ?>
                        </div>
                        <form action="<?= BASEURL; ?>/patients/createactive" method="post">
                            <!-- ... (Form fields above) ... -->
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="kecamatan_id">Subdistrict:</label>
                                        <select class="form-select" id="kecamatan_id" name="kecamatan_id" required>
                                        <?php foreach ($data['kecamatan'] as $kecamatan) : ?>
    <option value="<?= $kecamatan['id']; ?>"><?= $kecamatan['name']; ?></option>
<?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="desa_id">Village:</label>
                                        <select class="form-select" id="desa_id" name="desa_id" required>
                                            <!-- Options for village will be dynamically populated using JavaScript -->
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Tambah Pasien" class="btn btn-primary">
                        </form>

                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    <script>
        // Dapatkan elemen select kecamatan dan desa
        var subdistrictSelect = document.getElementById("kecamatan_id");
        var villageSelect = document.getElementById("desa_id");

        // Fungsi untuk memperbarui pilihan desa berdasarkan kecamatan yang dipilih
        function updateVillageOptions() {
            var selectedSubdistrictId = subdistrictSelect.value;

            // Hapus semua opsi desa yang ada
            villageSelect.innerHTML = "";

            // Ambil data desa berdasarkan kecamatan_id menggunakan AJAX atau fetch API
            // Contoh sederhana menggunakan fetch API
            fetch("<?= BASEURL; ?>/patients/getVillagesBySubdistrictId/" + selectedSubdistrictId)
                .then(response => response.json())
                .then(data => {
                    // Tambahkan opsi desa ke dalam elemen select desa
                    data.forEach(village => {
                        var option = new Option(village.name, village.id);
                        villageSelect.add(option);
                    });
                })
                .catch(error => console.error("Error fetching villages:", error));
        }

        // Panggil fungsi untuk pertama kali
        updateVillageOptions();

        // Tambahkan event listener untuk memperbarui opsi desa ketika pilihan kecamatan berubah
        subdistrictSelect.addEventListener("change", updateVillageOptions);
    </script>
</div>