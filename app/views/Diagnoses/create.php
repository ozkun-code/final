<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Add Diagnoses</h4>

        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-8">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Diagnoses</h5>
                    <div class="card-body text-center">
                        <?php Flasher::flash(); ?>
                    </div>
                </div>

                <div class="card-body">
                    <form action="<?= BASEURL; ?>/Diagnoses/create" method="post">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="date">Date :</label><br>
                                <input id="date" name="ate" type="date">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="diagnosis_information">Diagnosis information :
                            </label>
                            <input type="text" class="form-control" id="diagnosis_information" name="diagnosis_information" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="diagnosis">Diagnosis :
                            </label>
                            <input type="text" class="form-control" id="diagnosis" name="diagnosis" required>
                        </div>
                        <input type="submit" value="Add Diagnoses" class="btn btn-primary">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

</div>