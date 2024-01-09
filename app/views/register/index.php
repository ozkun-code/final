<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Register Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://www.rapidexpress.pk/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="https://www.rapidexpress.pk/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="https://www.rapidexpress.pk/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="https://www.rapidexpress.pk/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="https://www.rapidexpress.pk/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="https://www.rapidexpress.pk/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="https://www.rapidexpress.pk/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="https://www.rapidexpress.pk/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="https://www.rapidexpress.pk/js/config.js"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="<?= BASEURL; ?>/assets/img/icons/icon.svg" width="50" />
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">SEECARE</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Register here 🚀</h4>
                        <?php Flasher::flash(); ?>

                        <div class="card-body">
                            <form action="<?= BASEURL; ?>/register/createactive" method="post">
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
                                <div class="mb-3">
                                    <label class="form-label" for="gender">Gender:</label><br>
                                    <label>Male</label>
                                    <input type="radio" name="gender" id="male" value="male" checked>
                                    <label>Female</label>
                                    <input type="radio" name="gender" id="female" value="female">
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="date_of_birth" class="col-md-2 col-form-label">Date</label>
                                        <input class="form-control" type="date" value="" id="date_of_birth" name="date_of_birth">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="contact">Contact:</label>
                                    <input type="text" class="form-control" id="contact" name="contact" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="address">Address:</label><input type="text" class="form-control" id="address" name="address" required>
                                </div>
                                <?php Flasher::flash(); ?>
                                <form action="<?= BASEURL; ?>/register/createactive" method="post">
                                    <!-- ... (Form fields above) ... -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="kecamatan_id">Subdistrict:</label>
                                                <select class="form-select" id="kecamatan_id" name="kecamatan_id" required>
                                                    <?php foreach ($data['kecamatan'] as $kecamatan) : ?>
                                                        <option value="<?php echo $kecamatan['id']; ?>"><?php echo $kecamatan['name']; ?></option>
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
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                            <label class="form-check-label" for="terms-conditions">
                                                I agree to
                                                <a href="javascript:void(0);">privacy policy & terms</a>
                                            </label>
                                        </div>
                                        <button class="btn btn-primary d-grid w-100">Sign up</button>
                                    </div>

                                    <p class="text-center">
                                        <span>Already have an account?</span>
                                        <a href="<?= BASEURL; ?>/login">
                                            <span>Sign in instead</span>
                                        </a>
                                    </p>
                                </form>
                        </div>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="https://www.rapidexpress.pk/vendor/libs/jquery/jquery.js"></script>
    <script src="https://www.rapidexpress.pk/vendor/libs/popper/popper.js"></script>
    <script src="https://www.rapidexpress.pk/vendor/js/bootstrap.js"></script>
    <script src="https://www.rapidexpress.pk/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="https://www.rapidexpress.pk/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="https://www.rapidexpress.pk/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
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

</body>

</html>