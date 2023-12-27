<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Drug</h4>

        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-8">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Drug</h5>
                </div>
                <div class="card-body text-center">
                    <?php Flasher::flash(); ?>
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/drug/updateDrug/<?= $data['id']; ?>" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="nama_obat">Name of Drug :</label>
                                    <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= $data['nama_obat']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="harga_beli">purchase price :
                                    </label>
                                    <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="<?= $data['harga_beli']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="harga_jual">selling price
                                        :
                                    </label>
                                    <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="<?= $data['harga_jual']; ?>" required>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="stok">Stok:</label>
                                            <input type="text" class="form-control" id="stok" name="stok" value="<?= $data['stok']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="expayer_date">Expired Date :</label><br>
                                            <input id="expayer_date" name="expayer_date" type="date" value="<?= $data['expayer_date']; ?>" required>
                                        </div>
                                    </div>

                                </div>
                                <input type="submit" value="Update Drug" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>