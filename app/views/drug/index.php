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
                                <script>
                                    function submitForm() {
                                        var searchValue = document.getElementById('search').value;
                                        var form = document.getElementById('searchForm');
                                        form.action = "<?= BASEURL; ?>/drug/" + searchValue;
                                        form.submit();
                                    }
                                </script>

                                <form class="d-flex" id="searchForm" onsubmit="event.preventDefault(); submitForm();">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>

                            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                                <div class="dt-buttons">
                                    <a href="<?= BASEURL; ?>/drug/create/" class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0">
                                        <span>
                                            <i class="bx bx-plus me-sm-1"></i>
                                            <span class="d-none d-sm-inline-block">Add New Drug</span>
                                        </span>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <?php Flasher::flash(); ?>
                        </div>
                        <table class="datatables-basic table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1163px;">
                            <thead>
                                <tr>
                                    <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=""></th>
                                    <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label="">
                                        <input type="checkbox" class="form-check-input">
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 82px;">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Nama</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Harga jual</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Stok</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Expayer date</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['drugs'] as $drug) : ?>
                                    <tr class="odd">
                                        <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                        <td class="  dt-checkboxes-cell">
                                            <input type="checkbox" class="dt-checkboxes form-check-input">
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start align-items-center user-name">
                                                <div class="d-flex flex-column">
                                                    <span class="emp_name text-truncate"><?= $drug['id'] ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $drug['nama_obat'] ?></td>
                                        <td><?= $drug['harga_jual'] ?></td>
                                        <td><?= $drug['stok'] ?></td>
                                        <td><?= $drug['expayer_date'] ?></td>
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
                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="deleteModal<?= $drug['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel" style="font-size: 20px;">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" style="font-size: 20px;">
                                                    Apakah Anda yakin ingin menghapus Obat <strong><?= ucfirst($drug['nama_obat']) . ' ' ?></strong> ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <a href="<?= BASEURL; ?>/drug/delete/<?= $drug['id']; ?>" class="btn btn-primary">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            </tbody>
                        <?php endforeach; ?>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>