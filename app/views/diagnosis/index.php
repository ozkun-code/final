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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDiagnosisModal">
                            Add Diagnosis
                        </button>


                    </div>
                    <div class="card-body text-center">
                        <?php Flasher::flash(); ?>
                    </div>
                    <table class="datatables-basic table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1163px;">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 82px;">No.</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Doctor Name</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Date</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Diagnosis</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Symptoms:</th>
                                <th class="sorting" rowspan="1" colspan="1" style="width: 66px;">Recipe</th>
                                <th class="sorting" rowspan="1" colspan="1" style="width: 66px;">invoice</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $number = 1; foreach ($data['diagnosis'] as $diagnosis) : ?>
                                <tr class="odd">
                                    <td><?= $number++; ?></td>
                                    <td>
                                        <?= ucfirst($diagnosis['first_name']) . ' ' . ucfirst($diagnosis['last_name']) ?>
                                    </td>
                                    <td>
                                        <?= $diagnosis['date'] ?>
                                    </td>
                                    <td>
                                        <?= $diagnosis['diagnosis'] ?>
                                    </td>
                                    <td>
                                        <?= $diagnosis['diagnosis_information'] ?>
                                    </td>

                                    
                                    <td>
                                    <a href="<?= BASEURL; ?>/drug/recipe/<?= $diagnosis['id']; ?>" class="btn btn-primary">
                                  
                                            <i class="bx bx-action bx-xs me-1"></i>Recipes
                                        </span>
                                    </a>
                                    </td>
                                    <td>
                                    <a href="#" class="btn btn-secondary invoice-button" data-diagnosis-id="<?= $diagnosis['id']; ?>">Invoice</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addDiagnosisModal" tabindex="-1" aria-labelledby="addDiagnosisModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDiagnosisModalLabel">Add Diagnosis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/Diagnosis/createactive" method="post">
                        <div class="mb-3">
                            <label class="form-label" for="patient_id">Patient :</label>
                            <?php $patient = $data['patient']; ?>
                                <input type="text" class="form-control" id="patient_name" name="patient_name" value="<?= ucfirst($patient['first_name']) . ' ' . ucfirst($patient['last_name']) ?>" readonly>
                                <input type="hidden" id="patient_id" name="patient_id" value="<?= $patient['id'] ?>">

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="doctor_id">Dokter :</label>
                            <select class="form-select" id="doctor_id" name="doctor_id" required>
                                <?php foreach ($data['doctors'] as $doctor): ?>
                                    <option value="<?= $doctor['id'] ?>">dr.
                                        <?= ucfirst($doctor['first_name']) . ' ' . ucfirst($doctor['last_name']) ?>
                                    </option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="date">Date :</label>
                                <input id="date" name="date" type="date" class="form-control" value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="diagnosis">Diagnosis :</label>
                            <input type="text" class="form-control" id="diagnosis" name="diagnosis" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="diagnosis_information">Symptoms :</label>
                            <input type="text" class="form-control" id="diagnosis_information" name="diagnosis_information" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" value="Add Diagnosis" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal konfirmasi jumlah looping -->
<div class="modal fade" id="confirmLoopingModal" tabindex="-1" aria-labelledby="confirmLoopingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmLoopingModalLabel">Confirm the amount of medication</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Enter amount:</p>
                <input type="number" class="form-control" id="confirmLoopingCount" placeholder="Enter amount" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirmLoopingBtn">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan bagian berikut di bagian bawah halaman sebelum tag </body> -->
<!-- Tambahkan bagian berikut di bagian bawah halaman sebelum tag </body> -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var invoiceButtons = document.querySelectorAll('.invoice-button');

    invoiceButtons.forEach(function (button) {
      button.addEventListener('click', function (event) {
        event.preventDefault();

        var diagnosisId = button.getAttribute('data-diagnosis-id');

        // Tampilkan modal konfirmasi jumlah looping
        $('#confirmLoopingModal').modal('show');

        // Tangani klik pada tombol konfirmasi di dalam modal
        document.getElementById('confirmLoopingBtn').addEventListener('click', function () {
          // Dapatkan nilai jumlah looping dari input
          var loopingCount = document.getElementById('confirmLoopingCount').value;

          // Jika pengguna memasukkan nilai dan tidak membatalkan
          if (loopingCount !== '') {
            // Redirect ke halaman invoice dengan menyertakan parameter jumlah looping dan ID diagnosa
            var invoiceUrl = "<?= BASEURL; ?>/transaction/" + diagnosisId + "/" + encodeURIComponent(loopingCount);
            window.location.href = invoiceUrl;
          }

          // Tutup modal konfirmasi
          $('#confirmLoopingModal').modal('hide');
        });
      });
    });
  });
</script>


