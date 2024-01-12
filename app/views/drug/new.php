<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Add Drugs</h4>

        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-8">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add New Drug</h5>
                </div>
                <div class="card-body text-center">
                    <?php Flasher::flash(); ?>
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/drug/createNewDrugAction" method="post">
                        <div class="mb-3">
                            <label class="form-label" for="nama_obat">Name of Drug :</label>
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="harga_beli">Purchase price :</label>
                            <input type="text" class="form-control" id="harga_beli" name="harga_beli" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="harga_jual">Selling price :</label>
                            <input type="text" class="form-control" id="harga_jual" name="harga_jual" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="quantity">Stok:</label>
                                    <input type="text" class="form-control" id="quantity" name="quantity" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="expired_date">Expired Date :</label><br>

                                    <input id="expired_date" name="expired_date" type="date"class="form-control">

                                </div>
                            </div>
                        </div>

                        <!-- Hidden input field to indicate the action -->
                        <input type="hidden" name="action" value="addDrug">

                        <input type="submit" value="Add Drugs" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>