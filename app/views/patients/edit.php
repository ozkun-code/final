<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Patient Medical Information</h4>

        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-8">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Patient Medical Information</h5>
                </div>
                <div class="card-body text-center">
                    <?php Flasher::flash(); ?>
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/medicalinformation/updateMedicalInformation/<?= $data['id']; ?>" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="height">Height:</label>
                                    <input type="text" class="form-control" id="height" name="height" value="<?= $data['height']; ?>" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="weight">Weight:</label>
                                    <input type="text" class="form-control" id="weight" name="weight" value="<?= $data['weight']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <!-- Add more fields as necessary... -->
                        <input type="submit" value="Update Medical Information" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
