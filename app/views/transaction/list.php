<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">DataTables /</span> invoices
        </h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div class="card-body text-center">
                    <?php Flasher::flash(); ?>
                </div>
                <table class="datatables-basic table border-top dataTable no-footer dtr-column" id="DataTables_Table1" aria-describedby="DataTables_Table_0_info" style="width: 1163px;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Invoice ID</th>
                            <th>Nama Patient</th>
                            <th>Total Invoice</th>
                            <th>Date</th>
                            <th>Action</th> <!-- Kolom Action ditambahkan di sini -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $number = 1; foreach ($data['invoices'] as $invoice) : ?>
                            <tr class="odd">
                                <td><?= $number++; ?></td>
                                <td><span class="badge bg-label-success">#<?= $invoice['id'] ?></span></td>
                                <td><?= ucfirst($invoice['first_name']) . ' ' . ucfirst($invoice['last_name']) ?></td>
                                <td><?= "Rp " . number_format($invoice['total'], 0, ',', '.') ?></td>
                                <td><?= $invoice['date'] ?></td>
                                <td>
                                    <a href="<?= BASEURL; ?>/transaction/print/<?= $invoice['id'] ?>" class="btn btn-primary">Print</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
