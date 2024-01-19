
<?php
$showAdminCard = ( $data['role'] === 'super_admin');
$showInvoiceCard = ($data['role'] === 'admin');
$showDoctorsCard = ($data['role'] === 'doctor');
?>
        
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <!--/ Total Revenue -->
                <div class="col-12 col-md-12 col-6 mb-4">
                  <div class="row">
                  <?php if ($showAdminCard) : ?>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="bx bx-user-voice" style="font-size: 40px; color: #696cff;"></i>
                            </div>
                          </div>
                          <span class="fw-medium d-block mb-1">Admin</span>
                          <h3 class="card-title mb-2"><?php echo $data['adminCount']; ?> Users</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                      <div class="card">

                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="bx bx-heart" style="font-size: 40px; color: #696cff;"></i>
                            </div>
                          </div>
                          <span class="fw-medium d-block mb-1">Doctors</span>
                          <h3 class="card-title mb-2"><?php echo $data['doctorCount']; ?> Users</h3>
                        </div>
                      </div>
                    </div>

                  <?php endif; ?>
                  <?php if ($showInvoiceCard) : ?>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="bx bx-food-menu" style="font-size: 40px; color: #696cff;"></i>
                            </div>
                          </div>
                          <span class="fw-medium d-block mb-1">Invoice</span>
                          <h3 class="card-title mb-2"><?php echo $data['invoiceCount']; ?> Invoice</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                      <div class="card">

                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="bx bx-heart" style="font-size: 40px; color: #696cff;"></i>
                            </div>
                          </div>
                          <span class="fw-medium d-block mb-1">Doctors</span>
                          <h3 class="card-title mb-2"><?php echo $data['doctorCount']; ?> Users</h3>
                        </div>
                      </div>
                    </div>

                    <?php endif; ?>
                    <?php if ($showDoctorsCard) : ?>
                      <div class="col-lg-2 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="bx bx-food-menu" style="font-size: 40px; color: #696cff;"></i>
                            </div>
                          </div>
                          <span class="fw-medium d-block mb-1">Invoice</span>
                          <h3 class="card-title mb-2"><?php echo $data['invoiceCount']; ?> Invoice</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="bx bx-dna" style="font-size: 40px; color: #696cff;"></i>
                            </div>
                          </div>
                          <span class="fw-medium d-block mb-1">Diagnosis</span>
                          <h3 class="card-title mb-2"><?php echo $data['diagnosisCount']; ?> Diagnosis</h3>
                        </div>
                      </div>
                    </div>

                          <?php endif; ?>
                    
                    
                    
                    
                    
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="bx bx-user" style="font-size: 40px; color: #696cff;"></i>
                            </div>
                          </div>
                          <span class="fw-medium d-block mb-1">Patients</span>
                          <h3 class="card-title mb-2"><?php echo $data['patientCount']; ?> Users</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="bx bx-capsule" style="font-size: 40px; color: #696cff;"></i>
                            </div>
                          </div>
                          <span class="fw-medium d-block mb-1">Drug</span>
                          <h3 class="card-title mb-2"><?php echo $data['drugCount']; ?> </h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                            </div>
                          </div>
                          <span class="fw-medium d-block mb-1">service revenue</span>
                          <h3 class="card-title mb-2">Rp <?php echo number_format($data['serviceProfit'], 0, ',', '.'); ?></h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                            </div>
                          </div>
                          <span class="fw-medium d-block mb-1">Drug revenue</span>
                          <h3 class="card-title mb-2">Rp <?php echo number_format($data['drugProfit'], 0, ',', '.'); ?></h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-12 col-6 mb-4">
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

                        </tr>
                    </thead>
                    <tbody>
                        <?php $number = 1; foreach ($data['invoices'] as $invoice) : ?>
                          
                                <tr class="odd">
                                    <td><?= $number++; ?></td>
                                    <td><span class="badge bg-label-success">#<?= $invoice['id'] ?></td></span>
                                    <td><?= ucfirst($invoice['first_name']) . ' ' . ucfirst($invoice['last_name']) ?></td>
                                    <td><?= "Rp " . number_format($invoice['total'], 0, ',', '.') ?></td>
                                    <td><?= $invoice['date'] ?></td>
                                   
                                </tr>
                           
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
                    </div>
                  </div>