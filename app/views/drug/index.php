<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">DataTables /</span> Drug
        </h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="tab-content doc-example-content" id="tab-tabContent" data-label="Example">
                <div class="card-body text-center">
                    <?php Flasher::flash(); ?>
                </div>
                <div class="tab-pane fade show active" id="basic-datatable-preview" role="tabpanel" aria-labelledby="basic-datatable-preview-tab">
                    <div class="card">
                        <div class="card-datatable table-responsive pt-0">

                            <!-- Tabel untuk menampilkan data -->
                            <table class="datatables-basic table border-top dataTable no-footer dtr-column" id="DataTables_Table1" aria-describedby="DataTables_Table_0_info" style="width: 1163px;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Harga jual</th>
                                        <th>Harga beli</th>
                                        <th>Stok</th>
                                     
                                <!-- Kolom untuk tombol modal -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $number = 1; foreach ($data['drugs'] as $drug) : ?>
                                        <?php if ($drug['status']) : ?>
                                            <tr class="odd">
                                                <td><?= $number++; ?></td>
                                                <td><?= $drug['nama_obat'] ?></td>
                                                <td><?= $drug['harga_jual'] ?></td>
                                                <td><?= $drug['harga_beli'] ?></td>
                                                <td><?= $drug['total_stok'] ?></td>
                                                
                                                
                                            </tr>
                                            <!-- Modal detail stok dan tanggal kedaluwarsa -->
                                            <div class="modal fade" id="detailModal<?= $drug['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        <?php endif; ?>
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
