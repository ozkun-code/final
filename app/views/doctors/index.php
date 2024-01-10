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
                 </div>
               </div>
               <div class="card-body text-center">
                 <?php Flasher::flash(); ?>
               </div>
               <table class="datatables-basic table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1163px;">
                 <thead>
                   <tr>
                     <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 20px;">No.</th>
                     <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;">Nama</th>
                     <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 80px;">Email</th>
                     <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 50px;">Contact</th>
                     <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 62px;">specialty</th>
                     <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 66px;">Actions</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php $number = 1;
                    foreach ($data['doctors'] as $doctor) : ?>
                     <?php if ($doctor['status_account']) : ?>
                       <tr class="odd">
                         <td><?= $number++; ?></td>
                         <td>dr. <?= ucfirst($doctor['first_name']) . ' ' . ucfirst($doctor['last_name']) ?></td>
                         <td><?= $doctor['email'] ?></td>
                         <td><?= $doctor['contact'] ?></td>
                         <td class="" style="">
                           <span class="badge  bg-label-success"><?= $doctor['specialty'] ?></span>
                         </td>
                         <td class="" style="">
                           <div class="d-inline-block">
                             <a href="<?= BASEURL; ?>/doctors/edit/<?= $doctor['id']; ?>" class="btn btn-sm btn-icon item-edit">
                               <i class="bx bxs-edit"></i>
                               <a href="#" class="btn btn-sm btn-icon delete-record" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $doctor['id']; ?>">
                                 <i class="bx bxs-trash"></i>
                               </a>
                           </div>
                         </td>
                       </tr>
                       <!-- Modal Hapus -->
                       <div class="modal fade" id="deleteModal<?= $doctor['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                           <div class="modal-content">
                             <div class="modal-header">
                               <h5 class="modal-title" id="deleteModalLabel" style="font-size: 20px;">Konfirmasi Hapus</h5>
                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
                             <div class="modal-body" style="font-size: 20px;">
                               Apakah Anda yakin ingin menghapus dokter <strong><?= ucfirst($doctor['first_name']) . ' ' . ucfirst($doctor['last_name']) ?></strong> ini?
                             </div>
                             <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                               <a href="<?= BASEURL; ?>/doctors/delete/<?= $doctor['id']; ?>" class="btn btn-primary">Hapus</a>
                             </div>
                           </div>
                         </div>
                       </div>

                 </tbody>
               <?php endif; ?>
             <?php endforeach; ?>
               </table>

             </div>
           </div>
         </div>

       </div>
     </div>