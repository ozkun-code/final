<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">DataTables /</span> Recipe
        </h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div class="card-body text-center">
                    <?php Flasher::flash(); ?>
                </div>
                <?php if (isset($data['invoices']) && !empty($data['invoices'])) : ?>
                    <table class="datatables-basic table border-top dataTable no-footer dtr-column" id="DataTables_Table1" aria-describedby="DataTables_Table_0_info" style="width: 1163px;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama obat</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Expired Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1; foreach ($data['invoices'] as $invoice) : ?>
                                <?php if (isset($data['recipes'][$invoice['id']]) && !empty($data['recipes'][$invoice['id']])) : ?>
                                    
                                    <?php foreach ($data['recipes'][$invoice['id']] as $recipe) : ?>
                                        <tr>
                                            <td><?= $number++; ?></td>
                                            <td><?= $recipe['nama_obat'] ?></td>
                                            <td><?= $recipe['quantity'] ?></td>
                                            <td><?= $recipe['price'] ?></td>
                                            <td><?= $recipe['expired_date'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td><?= $number++; ?></td>
                                        <td colspan="5">Resep belum dibuat untuk invoice ini.</td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                   
                    <p>data tidak tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
