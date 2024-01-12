<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Add Stock</h4>

        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-8">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Stock</h5>
                </div>
                <div class="card-body text-center">
                    <?php Flasher::flash(); ?>
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/drug/addStockAction" method="post">
                        <div class="mb-3 col-md-5">
                            <label for="selectDrug" class="form-label">Select Drug:</label>
                            <select id="selectDrug" class="selectpicker w-100" data-style="btn-default" data-live-search="true" name="drug_id" required>
                                <option value="" selected>Select a drug...</option>
                                <?php foreach ($data['drugs'] as $drug) : ?>
                                    <option value="<?= $drug['id']; ?>"><?= $drug['nama_obat']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="quantity">Quantity:</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="expired_date">Expired Date:</label><br>
                            <input id="expired_date"  class="form-control" name="expired_date" type="date" required>
                        </div>
                        <input type="submit" value="Add Stock" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>