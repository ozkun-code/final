
<?php
var_dump($data['patient']);
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
                <!-- Data Patients Form -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Data Patients</h3>
                </div>

                <div class="card-body text-center">
                <?php Flasher::flash(); ?>
                </div>
                
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/patients/updatePatient/<?= $patient['id'] ?>" method="post">
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
                        <input type="hidden" name="kecamatan_id" value="<?= $patient['kecamatan_id'] ?? ''; ?>">
                        <input type="hidden" name="desa_id" value="<?= $patient['desa_id'] ?? ''; ?>">
                        <input type="hidden" name="status_account" value="<?= $patient['status_account'] ?? ''; ?>">
                        <input type="hidden" name="gender" value="<?= $patient['gender'] ?? ''; ?>">
                        

                        <input type="submit" value="Tambah Data Pasien" class="btn btn-primary">
                    </form>
                </div>

                <!-- Medical Information Form -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Medical Information</h3>
                </div>
                <div class="card-body">
                <form action="<?= BASEURL; ?>/patients/createOrUpdateMedical/<?= $patient['id'] ?>" method="post">
    <div class="row">
        <div class="mb-3">
            <label class="form-label" for="height">Height (cm):</label>
            <input type="text" class="form-control" id="height" name="height" placeholder="Enter height in centimeters" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="weight">Weight (kg):</label>
            <input type="text" class="form-control" id="weight" name="weight" placeholder="Enter weight in kilograms" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="blood_group">Blood Group:</label>
            <input type="text" class="form-control" id="blood_group" name="blood_group" placeholder="Enter blood group" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="pulse">Pulse (bpm):</label>
            <input type="text" class="form-control" id="pulse" name="pulse" placeholder="Enter pulse rate in beats per minute" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="blood_pressure">Blood Pressure (mmHg):</label>
            <input type="text" class="form-control" id="blood_pressure" name="blood_pressure" placeholder="Enter blood pressure in millimeters of mercury" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="respiration">Respiration (breaths/min):</label>
            <input type="text" class="form-control" id="respiration" name="respiration" placeholder="Enter respiration rate in breaths per minute" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="allergy">Allergy:</label>
            <input type="text" class="form-control" id="allergy" name="allergy" placeholder="Enter any allergies" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="diet">Diet:</label>
            <input type="text" class="form-control" id="diet" name="diet" placeholder="Enter dietary information" required>
        </div>

        <input type="submit" value="Update Medical Information" class="btn btn-primary">
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>

