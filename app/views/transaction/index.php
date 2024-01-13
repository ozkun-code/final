 <!-- Content wrapper -->
 <div class="content-wrapper">
   <!-- Content -->
   <div class="container-xxl flex-grow-1 container-p-y">

     <!-- Invoice Add-->
     <div class="layout-demo-wrapper">
       <div class="card invoice-preview-card">
         <div class="card-body">
           <div class="row p-sm-3 p-0">
             <div class="col-md-6 mb-md-0 mb-4">
               <div class="d-flex svg-illustration mb-4 gap-2">
                 <span class="app-brand-logo demo">
                  
                   <img src="<?= BASEURL; ?>/assets/img/icons/icon.svg" width="40" /> <?php $patient = $data['patientData']; ?> </span>
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
                   <div class="w-px-150"><input type="text" class="form-control" disabled placeholder="" value="AUTOSYSTEM" id="invoiceId" />
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
               <p class="mb-1"> <?= $patient['address'] ?>, <?= $patient['desa_name'] ?> </p>
               <p class="mb-1"> <?= $patient['kecamatan_name'] ?>, karawang , Indonesia </p>
               <p class="mb-0"> <?= $patient['contact'] ?> </p>
             </div>
             <?php $looping = $data['loopingCount']; ?>
             <div class="col"> <?php $diagnosis = $data['diagnosisData']; ?> <h6>Diagnosis:</h6>
               <p> <?= $diagnosis['diagnosis'] ?> </p>
               <h6>Diagnosis Information :</h6>
               <p> <?= $diagnosis['diagnosis_information'] ?> </p>
             </div>
           </div>
           <hr class="mx-n4" />
           <form class="source-item py-sm-3" action="<?= BASEURL; ?>/transaction/storeRecipe/<?= $patient['id'] ?>/<?= $looping ?>" method="POST">
    <div id="service-fee">
        
        <?php for ($i = 0; $i < $looping; $i++) : ?>
            <div class="mb-3" data-repeater-list="group-a">
                <div class="repeater-wrapper pt-0 pt-md-0" data-repeater-item>
                    <div class="d-flex border rounded position-relative pe-0">
                        <div class="row w-100 m-0 p-3">
                            <div class="mb-3 col-md-5">
                                <?php if ($i == 0) : ?>
                                    <label for="selectDrug<?= $i ?>" class="form-label">Select Drug</label>
                                <?php endif; ?>
                                <select id="selectDrug<?= $i ?>" name="selectDrug<?= $i ?>" class="selectpicker w-100" data-style="btn-default" data-live-search="true">
                                    <option value="" selected>Select a drug...</option>
                                    <?php foreach ($data['drugData'] as $obat) : ?>
                                        <option value="<?= $obat['id'] ?>"><?= $obat['nama_obat'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3 col-12 mb-md-0 mb-3">
                                <?php if ($i == 0) : ?>
                                    <p class="mb-2 repeater-title">Qty</p>
                                <?php endif; ?>
                                <input type="number" id="qty<?= $i ?>" name="qty<?= $i ?>" class="form-control invoice-item-qty" placeholder="1" min="1" max="50" />
                            </div>
                            <div class="col-md-4 col-12 pe-0" style="text-align: center;">
                                <?php if ($i == 0) : ?>
                                    <p class="mb-2 repeater-title">Total Price</p>
                                <?php endif; ?>
                                <p id="total_price<?= $i ?>" name="total_price<?= $i ?>" class="mb-0"></p>
                                <input type="hidden" id="total_price<?= $i ?>" name="total_price<?= $i ?>" value="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
                 <hr class="my-4 mx-n4" />
           <div class="row py-mb-0">
             <div class="col-md-6 mb-md-0 mb-3">
               <div class="d-flex align-items-center mb-3"> <?php $admin = $data['adminData']; ?> <label for="salesperson" class="form-label me-5 fw-medium">Salesperson:</label>
                 <input type="text" class="form-control" id="salesperson" disabled placeholder="<?= ucfirst($admin['first_name']) . ' ' . ucfirst($admin['last_name']) ?>" />
               </div>
               <input type="text" class="form-control" id="invoiceMsg" disabled placeholder="Semoga Anda sehat selalu." />
             </div>
             <div class="col-md-5 d-flex justify-content-end">
               <div class="invoice-calculations">
                 <hr />
                 <div class="d-flex justify-content-between">
                   <span class="w-px-100">Total:</span>
                   <input type="hidden" id="total" name="total" value="" />
                   <span class="fw-medium">Rp.0</span>
                 </div>
               </div>
             </div>
           </div>
           <hr class="my-4 mx-n4" />
           <div class="card-body text-center">
                            <?php Flasher::flash(); ?>
                        </div>
               <button class="btn btn-secondary d-grid w-100 mb-3" type="submit">
                 <span class="d-flex align-items-center justify-content-center text-nowrap">
                   <i class="bx bx-action bx-xs me-1"></i>Save recipe
                 </span>
               </button>
           </form>
         </div>

        

       </div>

     </div>
   </div>
   <!-- /Invoice Add-->
   <!-- Invoice Actions -->
   <script>
     // Fungsi untuk memformat angka ke rupiah
     function formatRupiah(angka, prefix) {
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
     for (let i = 0; i < <?= $looping ?>; i++) {
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
         fetch("<?= BASEURL; ?>/transaction/getDrugPriceById/" + selectedDrugId).then(response => response.json()).then(data => {
           // Perbarui harga dalam elemen harga
           let totalPrice = data[0].harga_jual * qty;
           priceElement.textContent = formatRupiah(totalPrice.toString(), "Rp. ");
           // Perbarui total untuk item ini
           items[i] = totalPrice;
           // Perbarui total keseluruhan dengan menjumlahkan total dari setiap item
           let total = items.reduce((acc, item) => acc + item, 0);
           // Perbarui total dalam elemen total
           totalElement.textContent = formatRupiah(total.toString(), "Rp. ");
         }).catch(error => console.error("Error fetching price:", error));
       }
       // Panggil fungsi untuk pertama kali
       updatePrice();
       // Tambahkan event listener untuk memperbarui harga ketika pilihan obat atau qty berubah
       drugSelect.addEventListener("change", updatePrice);
       qtyElement.addEventListener("input", updatePrice);
     }
   </script>
<script>
    // Misalkan Anda memiliki variabel JavaScript dengan nilai total harga
    var totalPrice = calculateTotalPrice(); // Ganti dengan fungsi Anda sendiri

    // Temukan elemen input dengan id 'total_price0'
    var inputElement = document.getElementById('total_price0');

    // Atur nilai dari elemen input ini dengan nilai total harga
    inputElement.value = totalPrice;
</script>

 </div>
 <!-- /Offcanvas -->
 </div>
 <!-- / Content -->