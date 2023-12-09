    <!-- Content wrapper -->
    <div class="content-wrapper">

      <!-- Content -->
      <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
          <span class="text-muted fw-light">DataTables /</span> patients
        </h4>

        <!-- DataTable with Buttons -->
        <div class="card">
          <div class="card-datatable table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
              <div class="card-header flex-column flex-md-row">
                <div class="head-label text-center">
                  <h5 class="card-title mb-0">List Of patients </h5>
                </div>
                <div class="dt-action-buttons text-end pt-3 pt-md-0">
                  <div class="dt-buttons">
                    <a href="<?= BASEURL; ?>/patients/create/" class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0">
                      <span>
                        <i class="bx bx-plus me-sm-1"></i>
                        <span class="d-none d-sm-inline-block">Add New patients</span>
                      </span>
                    </a>

                  </div>
                </div>
              </div>
              <table class="datatables-basic table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1163px;">
                <thead>
                  <tr>
                    <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=""></th>
                    <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 10px;" data-col="1" aria-label="">
                      <input type="checkbox" class="form-check-input">
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 20px;">ID</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;">Nama</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80px;">Contact</th>
                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 80px;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['patients'] as $patient) : ?>
                    <tr class="odd">
                      <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                      <td class="  dt-checkboxes-cell">
                        <input type="checkbox" class="dt-checkboxes form-check-input">
                      </td>
                      <td>
                        <div class="d-flex justify-content-start align-items-center user-name">
                          <div class="d-flex flex-column">
                            <span class="emp_name text-truncate"><?= $patient['id'] ?></span>
                          </div>
                        </div>
                      </td>
                      <td><?= ucfirst($patient['first_name']) . ' ' . ucfirst($patient['last_name']) ?></td>
                      <td><?= $patient['email'] ?></td>
                      <td><?= $patient['contact'] ?></td>
                      </td>
                      <td class="" style="">
                        <div class="d-inline-block">
                          <a href="<?= BASEURL; ?>/patients/edit/<?= $patient['id']; ?>" class="btn btn-sm btn-icon item-edit">
                            <i class="bx bxs-edit"></i>
                          </a>
                          <a href="#" class="btn btn-sm btn-icon delete-record" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $patient['id']; ?>">
                            <i class="bx bxs-trash"></i>
                          </a>
                        </div>
                      </td>
>>>>>>> bdf3c2c8f0815fb9ff23253d05672fdf626a856d


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
                            <a href="<?= BASEURL; ?>/patientss/delete/<?= $patient['id']; ?>" class="btn btn-primary">Hapus</a>
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