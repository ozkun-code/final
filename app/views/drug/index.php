<!-- Content wrapper -->
<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">DataTables /</span> Drug
        </h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header flex-column flex-md-row">
                        <div class="head-label text-center">
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <?php Flasher::flash(); ?>
                    </div>
                    <table id="DataTables_Table_0" class="datatables-basic table border-top dataTable no-footer dtr-column" aria-describedby="DataTables_Table_0_info" style="width: 1163px;">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 82px;">No.</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Nama</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Harga jual</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Harga beli</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Stok</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Expayer date</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="drugTableBody">
                            <?php $number = 1; foreach ($data['drugs'] as $drug) : ?>
                                <?php if ($drug['status']) : ?>
                                <tr class="odd">
                                    <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                    <td><?= $number++; ?></td>
                                    <td><?= $drug['nama_obat'] ?></td>
                                    <td><?= $drug['harga_jual'] ?></td>
                                    <td><?= $drug['harga_beli'] ?></td>
                                    <td><?= $drug['stok'] ?></td>
                                    <td><?= $drug['expired_date'] ?></td>
                                    <td class="" style="">
                                        <div class="d-inline-block">
                                            <a href="<?= BASEURL; ?>/drug/detail/<?= $drug['id']; ?>" class="btn btn-sm btn-icon item-edit">
                                                <i class="bx bxs-user-detail" title="detail patient"></i>
                                            </a>
                                            <a href="<?= BASEURL; ?>/drug/edit/<?= $drug['id']; ?>" class="btn btn-sm btn-icon item-edit">
                                                <i class="bx bxs-edit" title="edit patient"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-icon delete-record" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $drug['id']; ?>">
                                                <i class="bx bxs-trash" title="delete patient"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <script>
                        $(document).ready(function () {
                            $('#DataTables_Table_0').DataTable({
                                "processing": true,
                                "serverSide": true,
                                "ajax": {
                                    "url": "<?= BASEURL; ?>/drug/serverSide", // Ganti dengan URL yang sesuai
                                    "type": "POST"
                                },
                                "columns": [
                                    {"data": "number", "orde    rable": false, "searchable": false},
                                    {"data": "nama_obat"},
                                    {"data": "harga_jual"},
                                    {"data": "harga_beli"},
                                    {"data": "stok"},
                                    {"data": "expired_date"},
                                    {"data": "actions", "orderable": false, "searchable": false}
                                ]
                            });
                        });
                    </script>
                </div>
            </div>
