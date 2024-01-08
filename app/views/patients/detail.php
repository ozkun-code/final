
<?php
$patient = $data['patient'];
$medical = $data['medical'];
?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> Data Patient</h4>

        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-8">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Data Patients</h3>
                </div>
                <?php Flasher::flash(); ?>
                <div class="card-body text-center">
                  
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/patients/createactive" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="first_name">First Name:</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $patient['first_name'] ?? ''; ?>" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="last_name">Last Name:</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $patient['last_name'] ?? ''; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="date_of_birth">Date of Birth:</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?= $patient['date_of_birth'] ?? ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="contact">Contact:</label>
                            <input type="text" class="form-control" id="contact" name="contact" value="<?= $patient['contact'] ?? ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?= $patient['address'] ?? ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="desa_name">Desa:</label>
                            <input type="text" class="form-control" id="desa_name" name="desa_name" value="<?= $patient['desa_name'] ?? ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="kecamatan_name">Kecamatan:</label>
                            <input type="text" class="form-control" id="kecamatan_name" name="kecamatan_name" value="<?= $patient['kecamatan_name'] ?? ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="kabupaten">Kabupaten:</label>
                            <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="Karawang" readonly>
                        </div>
                        <h3 class="mb-0">Medical Information</h3>
                        <hr> <!-- Pemisah -->
                        <div class="mb-3">
                            <label class="form-label" for="height">Height:</label>
                            <input type="text" class="form-control" id="height" name="height" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="weight">Weight:</label>
                            <input type="text" class="form-control" id="weight" name="weight" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="blood_group">Blood Group:</label>
                            <input type="text" class="form-control" id="blood_group" name="blood_group" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="pulse">Pulse:</label>
                            <input type="text" class="form-control" id="pulse" name="pulse" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="blood_pressure">Blood Pressure:</label>
                            <input type="text" class="form-control" id="blood_pressure" name="blood_pressure" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="respiration">Respiration:</label>
                            <input type="text" class="form-control" id="respiration" name="respiration" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="allergy">Allergy:</label>
                            <input type="text" class="form-control" id="allergy" name="allergy" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="diet">Diet:</label>
                            <input type="text" class="form-control" id="diet" name="diet" required>
                        </div>
                        <input type="submit" value="Tambah Pasien" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
