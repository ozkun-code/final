<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Add Doctors</h4>

        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-8">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add New Doctor</h5>
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/doctors/create" method="post">
                        <div class="mb-3">
                            <label class="form-label" for="name">Nama:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
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
                            <label class="form-label" for="contact">Contact:</label>
                            <input type="text" class="form-control" id="contact" name="contact" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="specialty">Specialty:</label>
                            <input type="text" class="form-control" id="specialty" name="specialty" required>
                        </div>
                        <input type="submit" value="Tambah Dokter" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
