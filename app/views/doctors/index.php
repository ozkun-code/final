    <!-- Content wrapper -->
    <div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        
        <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">DataTables /</span> Doctors
        </h4>

        <!-- DataTable with Buttons -->
        <div class="card">
  <div class="card-datatable table-responsive">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
      <div class="card-header flex-column flex-md-row">
        <div class="head-label text-center">
          <h5 class="card-title mb-0">List Of Doctors </h5>
        </div>
        <div class="dt-action-buttons text-end pt-3 pt-md-0">
          <div class="dt-buttons">
            <button class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button">
              <span>
                <i class="bx bx-plus me-sm-1"></i>
                <span class="d-none d-sm-inline-block">Add New Doctors</span>
              </span>
            </button>
          </div>
        </div>
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
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Email</th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Contact</th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 112px;">specialty</th>
            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 66px;">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($data['doctors'] as $doctor) : ?>
          <tr class="odd">
            <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
            <td class="  dt-checkboxes-cell">
              <input type="checkbox" class="dt-checkboxes form-check-input">
            </td>
            <td>
              <div class="d-flex justify-content-start align-items-center user-name">
                <div class="d-flex flex-column">
                  <span class="emp_name text-truncate"><?= $doctor['id'] ?></span>
                </div>
              </div>
            </td>
            <td><?= $doctor['name'] ?></td>
            <td><?= $doctor['email'] ?></td>
            <td><?= $doctor['contact'] ?></td>
            <td class="" style="">
              <span class="badge  bg-label-success"><?= $doctor['specialty'] ?></span>
            </td>
            <td class="" style="">
            <div class="d-inline-block">
                <a href="<?= BASEURL; ?>/doctors/edit/<?= $doctor['id']; ?>" class="btn btn-sm btn-icon item-edit">
                <i class="bx bxs-edit"></i>
                </a>
                <a href="<?= BASEURL; ?>/doctors/delete/<?= $doctor['id']; ?>" class="btn btn-sm btn-icon delete-record">
                <i class="bx bxs-trash"></i>
                </a>
            </div>
            </td>
          </tr>
        </tbody>
        <?php endforeach; ?>
      </table>

    </div>
  </div>
</div>

    </div>
    </div>
