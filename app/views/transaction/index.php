 <!-- Content wrapper -->
 <div class="content-wrapper">
   <!-- Content -->
   <div class="container-xxl flex-grow-1 container-p-y">
     <div class="row invoice-add">
       <!-- Invoice Add-->
       <div class="col-lg-9 col-12 mb-lg-0 mb-4">
         <div class="card invoice-preview-card">
           <div class="card-body">
             <div class="row p-sm-3 p-0">
               <div class="col-md-6 mb-md-0 mb-4">
                 <div class="d-flex svg-illustration mb-4 gap-2">
                   <span class="app-brand-logo demo">
                     <img src="
											<?= BASEURL; ?>/assets/img/icons/icon.svg" width="40" /> <?php $patient = $data['patientData']; ?> </span>
                   <span class="app-brand-text demo text-body fw-bold">SEECARE</span>
                 </div>
                 <p class="mb-1">Jl. Pancawati Darawolong, Darawolong</p>
                 <p class="mb-1">Purwasari, Karawang,41371</p>
                 <p class="mb-0"> Jawa Barat, Indonesia</p>
               </div>
               <div class="col-md-6">
                 <dl class="row mb-2">
                   <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                     <span class="h4 text-capitalize mb-0 text-nowrap">Invoice #</span>
                   </dt>
                   <dd class="col-sm-6 d-flex justify-content-md-end">
                     <div class="w-px-150"> 
                    <?php
                    $date = new DateTime();
                    $timestamp = $date->format('YmdHis');
                    $patient_id = $patient['id'];
                    $invoice_id = $timestamp . '-' . $patient_id;
                    ?> 
                <input type="text" class="form-control" disabled placeholder="<?= $invoice_id ?>" value="<?= $invoice_id ?>" id="invoiceId" />
                     </div>
                   </dd>
                   <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                     <span class="fw-normal">Date:</span>
                   </dt>
                   <dd class="col-sm-6 d-flex justify-content-md-end">
                     <div class="w-px-150">
                       <input type="text" class="form-control" disabled placeholder="YYYY-MM-DD" value="<?= date('Y-m-d') ?>" />
                     </div>
                   </dd>
                 </dl>
               </div>
             </div>
             <hr class="my-4 mx-n4" />
             <div class="row d-flex justify-content-between mb-4">
               <div class="col-sm-6 w-50">
                 <h6>Invoice To:</h6>
                 <p class="mb-1"> <?= ucfirst($patient['first_name']) . ' ' . ucfirst($patient['last_name']) ?> </p>
                 <p class="mb-1"> <?= $patient['address'] ?> </p>
                 <p class="mb-1"> <?= $patient['desa_name'] ?>, <?= $patient['kecamatan_name'] ?> </p>
                 <p class="mb-1">karawang , Indonesia</p>
                 <p class="mb-0"> <?= $patient['contact'] ?> </p>
               </div>
               <div class="col"> <?php $diagnosis = $data['diagnosisData'];?> <h6>Diagnosis:</h6>
                 <p> <?= $diagnosis['diagnosis'] ?> </p>
                 <h6>Diagnosis Information :</h6>
                 <p> <?= $diagnosis['diagnosis_information'] ?> </p>
               </div>
             </div>
             <hr class="mx-n4" />
             <form id="dynamicForm" class="source-item py-sm-3" action="YOUR_SERVER_ENDPOINT" method="POST">
    <div class="mb-3">
        <label for="jumlahLooping" class="form-label">Jumlah Looping:</label>
        <input type="number" id="jumlahLooping" name="jumlahLooping" class="form-control" placeholder="Masukkan jumlah looping" min="1" />
    </div>

    <div id="formContainer">
        <!-- Elemen formulir akan ditambahkan di sini oleh JavaScript -->
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("jumlahLooping").addEventListener("input", function () {
                updateForm();
            });

            function updateForm() {
                var jumlahLooping = document.getElementById("jumlahLooping").value;
                var formContainer = document.getElementById("formContainer");

                // Hapus semua elemen formulir sebelum menambahkan yang baru
                formContainer.innerHTML = "";

                for (var i = 0; i < jumlahLooping; i++) {
                    var div = document.createElement("div");
                    div.className = "mb-3";
                    div.setAttribute("data-repeater-list", "group-a");

                    div.innerHTML = `
                        <div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item>
                            <div class="d-flex border rounded position-relative pe-0">
                                <div class="row w-100 m-0 p-3">
                                    <div class="mb-3 col-md-5">
                                        <label for="selectDrug${i}" class="form-label">Pilih Obat</label>
                                        <select id="selectDrug${i}" class="selectpicker w-100" data-style="btn-default" data-live-search="true">
                                            <option value="" selected>Pilih obat...</option>
                                            <?php foreach($data['drugData'] as $obat): ?>
                                                <option value="<?= $obat['id'] ?>"><?= $obat['nama_obat'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-12 mb-md-0 mb-3">
                                        <p class="mb-2 repeater-title">Qty</p>
                                        <input type="number" id="qty${i}" class="form-control invoice-item-qty" placeholder="1" min="1" max="50" />
                                    </div>
                                    <div class="col-md-4 col-12 pe-0">
                                        <p class="mb-2 repeater-title">Total Harga</p>
                                        <p id="total_price${i}" class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    formContainer.appendChild(div);
                }
            }
        });
    </script>
</form>








             <hr class="my-4 mx-n4" />
             <div class="row py-sm-3">
               <div class="col-md-6 mb-md-0 mb-3">
                 <div class="d-flex align-items-center mb-3"><?php $admin = $data['adminData']; ?><label for="salesperson" class="form-label me-5 fw-medium">Salesperson:</label>
                   <input type="text" class="form-control" id="salesperson" disabled placeholder="<?= ucfirst($admin['first_name']) . ' ' . ucfirst($admin['last_name']) ?>" />
                 </div>
                 <input type="text" class="form-control" id="invoiceMsg" disabled placeholder="Semoga Anda sehat selalu." />
               </div>
               <div class="col-md-6 d-flex justify-content-end">
    <div class="invoice-calculations">
        <hr />
        <div class="d-flex justify-content-between">
            <span class="w-px-100">Total:</span>
            <span class="fw-medium">Rp.0</span>
        </div>
    </div>
</div>

             <hr class="my-4" />
             <div class="row">
               <div class="col-12">
                 <div class="mb-3">
                   <label for="note" class="form-label fw-medium">Note:</label>
                   <textarea class="form-control" rows="2" id="note" placeholder="Invoice note"></textarea>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <!-- /Invoice Add-->
       <!-- Invoice Actions -->
       <div class="col-lg-3 col-12 invoice-actions">
         <div class="card mb-4">
           <div class="card-body">
             <button class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
               <span class="d-flex align-items-center justify-content-center text-nowrap">
                 <i class="bx bx-paper-plane bx-xs me-1"></i>Save </span>
             </button>
           </div>
         </div>
         <div>
           <p class="mb-2">Accept payments via</p>
           <select class="form-select mb-4">
             <option value="Bank Account">Bank Account</option>
             <option value="Cahs">Cash</option>
           </select>
         </div>
       </div>

       <script>
    // Fungsi untuk memformat angka ke rupiah
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    // Dapatkan elemen select obat, qty, dan harga
    let totalElement = document.querySelector(".invoice-calculations .fw-medium");
    let items = []; // Array untuk menyimpan total setiap item

    for (let i = 0; i < 10; i++) {
        let drugSelect = document.getElementById("selectDrug" + i);
        let qtyElement = document.getElementById("qty" + i);
        let priceElement = document.getElementById("total_price" + i);

        // Inisialisasi total untuk setiap item
        items[i] = 0;

        // Fungsi untuk memperbarui harga berdasarkan obat dan qty yang dipilih
        function updatePrice() {
            let selectedDrugId = drugSelect.value;
            let qty = qtyElement.value;

            // Ambil data harga berdasarkan id obat menggunakan AJAX atau fetch API
            fetch("http://final1.test/transaction/getDrugPriceById/" + selectedDrugId)
                .then(response => response.json())
                .then(data => {
                    // Perbarui harga dalam elemen harga
                    let totalPrice = data[0].harga_jual * qty;
                    priceElement.textContent = formatRupiah(totalPrice.toString(), "Rp. ");

                    // Perbarui total untuk item ini
                    items[i] = totalPrice;

                    // Perbarui total keseluruhan dengan menjumlahkan total dari setiap item
                    let total = items.reduce((acc, item) => acc + item, 0);

                    // Perbarui total dalam elemen total
                    totalElement.textContent = formatRupiah(total.toString(), "Rp. ");
                })
                .catch(error => console.error("Error fetching price:", error));
        }

        // Panggil fungsi untuk pertama kali
        updatePrice();

        // Tambahkan event listener untuk memperbarui harga ketika pilihan obat atau qty berubah
        drugSelect.addEventListener("change", updatePrice);
        qtyElement.addEventListener("input", updatePrice);
    }
</script>


</div>
       <!-- /Offcanvas -->
     </div>
     <!-- / Content -->