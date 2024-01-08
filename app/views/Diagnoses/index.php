<!-- Content wrapper -->
<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">DataTables /</span> Diagnosis
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
                    <table class="datatables-basic table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1163px;">
    <thead>
        <tr>
            <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=""></th>
            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label="">
                <input type="checkbox" class="form-check-input">
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 82px;">ID</th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Doctor Name</th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Date</th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Diagnosis Information</th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Diagnosis</th>
            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 66px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        
        <?php foreach ($data['diagnoses'] as $diagnosis) : ?>
            <tr class="odd">
                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                <td class="  dt-checkboxes-cell">
                    <input type="checkbox" class="dt-checkboxes form-check-input">
                </td>
                <td>
                    <div class="d-flex justify-content-start align-items-center user-name">
                        <div class="d-flex flex-column">
                            <span class="emp_name text-truncate"><?= $diagnosis['id'] ?></span>
                        </div>
                    </div>
                </td>
                <td><?= ucfirst($diagnosis['first_name']) . ' ' . ucfirst($diagnosis['last_name']) ?></td>
                <td><?= $diagnosis['date'] ?></td>
                <td><?= $diagnosis['diagnosis_information'] ?></td>
                <td><?= $diagnosis['diagnosis'] ?></td>
                <td>
                    <!-- Actions -->
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>