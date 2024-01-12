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
                            <table class="datatables-basic table border-top dataTable no-footer dtr-column" id="DataTables_Table1" style="width: 100%;">
                                <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1; foreach ($data['admins'] as $admin) : ?>
                                <?php if ($admin['status_account']) : ?>
                                    <tr class="odd">
                                        <td><?= $number++; ?></td>
                                        <td><?= ucfirst($admin['first_name']) . ' ' . ucfirst($admin['last_name']) ?></td>
                                        <td><?= $admin['email'] ?></td>
                                        <td><?= $admin['contact'] ?></td>
                                        <td class="" style="">
                                            <div class="d-inline-block">
                                                <a href="<?= BASEURL; ?>/admin/edit/<?= $admin['id']; ?>" class="btn btn-sm btn-icon item-edit">
                                                    <i class="bx bxs-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-icon delete-record" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $admin['id']; ?>">
                                                    <i class="bx bxs-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>


<!-- Modal Hapus -->
<?php foreach ($data['admins'] as $admin) : ?>
    <?php if ($admin['status_account']) : ?>
        <div class="modal fade" id="deleteModal<?= $admin['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel" style="font-size: 20px;">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="font-size: 20px;">
                        Apakah Anda yakin ingin menghapus dokter <strong><?= ucfirst($admin['first_name']) . ' ' . ucfirst($admin['last_name']) ?></strong> ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="<?= BASEURL; ?>/admin/delete/<?= $admin['id']; ?>" class="btn btn-primary">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
