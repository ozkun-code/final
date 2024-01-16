<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">DataTables /</span> Patients
        </h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="tab-content doc-example-content" id="tab-tabContent" data-label="Example">
                <div class="tab-pane fade show active" id="basic-datatable-preview" role="tabpanel" aria-labelledby="basic-datatable-preview-tab">
                    <div class="card">
                    <div class="card-body text-center">
                        <?php Flasher::flash(); ?>
                    </div>
                        <div class="card-datatable table-responsive pt-0">
                            <table class="datatables-basic table border-top dataTable no-footer dtr-column" id="DataTables_Table1" aria-describedby="DataTables_Table_0_info" style="width: 1163px;">
                                <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 20px;">No.</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80px;">Contact</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 80px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $number = 1; foreach ($data['patients'] as $patient) : ?>
                                        <tr class="odd">
                                            <td><?= $number++; ?></td>
                                            <td><?= ucfirst($patient['first_name']) . ' ' . ucfirst($patient['last_name']) ?></td>
                                            <td><?= $patient['user_email'] ?></td>
                                            <td><?= $patient['contact'] ?></td>
                                            <td class="" style="">
                                                <div class="d-inline-block">
                                                    <a href="<?= BASEURL; ?>/diagnosis/<?= $patient['id']; ?>" class="btn btn-sm btn-icon item-edit">
                                                        <i class="bx bx-history" title="history diagnosa"></i>
                                                    </a>
                                                    <a href="<?= BASEURL; ?>/patients/detail/<?= $patient['id']; ?>" class="btn btn-sm btn-icon item-edit">
                                                        <i class="bx bx-edit-alt" title="edit patients"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-icon delete-record" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $patient['id']; ?>">
                                                        <i class="bx bxs-trash" title="delete patient"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="deleteModal<?= $patient['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel" style="font-size: 20px;">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body" style="font-size: 20px;">
                                                        Apakah Anda yakin ingin menghapus dokter <strong><?= ucfirst($patient['first_name']) . ' ' . ucfirst($patient['last_name']) ?></strong> ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <a href="<?= BASEURL; ?>/patients/delete/<?= $patient['id']; ?>" class="btn btn-primary">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
