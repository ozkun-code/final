
<!DOCTYPE html>

































<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/item/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->


<html lang="en" class="light-style layout-wide " dir="ltr" data-theme="theme-default" data-assets-path="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Invoice (Print version) - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-admin-template/">
    
    
    <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-5DDHKGP');</script>
    <!-- End Google Tag Manager -->
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/css/demo.css" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/typeahead-js/typeahead.css" /> 
    

    <!-- Page CSS -->
    
<link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/css/pages/app-invoice-print.css" />

    <!-- Helpers -->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/js/config.js"></script>
    
</head>

<body>
<?php $patient = $data['invoice'] ?>
<?php $recipe = $data['recipe'] ?>

  
  <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  
  <!-- Content -->

<div class="invoice-print p-5">

  <div class="d-flex justify-content-between flex-row">
    <div class="mb-4">
      <div class="d-flex svg-illustration mb-3 gap-2">
      <span class="app-brand-logo demo">
                  <img src="<?= BASEURL; ?>/assets/img/icons/icon.svg" width="40" />
                  
                </span>
                <span class="app-brand-text demo text-body fw-bold">Recipe To Invoice</span>
              </div>
              <p class="mb-1">Jl. Pancawati Darawolong, Darawolong</p>
              <p class="mb-1">Purwasari, Karawang, 41371</p>
              <p class="mb-0">Jawa Barat, Indonesia</p>
            </div>
    <div>
      <h4>Invoice #<?= $patient['id'] ?></h4>
      <div class="mb-2">
        <span>Date :</span>
        <span class="fw-medium"><?= $patient['date'] ?></span>
      </div>
      
    </div>
  </div>

  <hr />

  <div class="row d-flex justify-content-between mb-4">
    <div class="col-sm-6 w-50">
    <h6>Invoice To:</h6>
    <p class="mb-1"> <?= ucfirst($patient['first_name']) . ' ' . ucfirst($patient['last_name']) ?> </p>
    <p class="mb-1"> <?= $patient['address'] ?>, <?= $patient['desa_name'] ?> </p>
    <p class="mb-1"> <?= $patient['kecamatan_name'] ?>, karawang , Indonesia </p>
    <p class="mb-0"> <?= $patient['contact'] ?> </p>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table border-top m-0">
      <thead>
        <tr>
          <th>Item</th>
          <th></th>
          <th></th>
          <th>Qty</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($recipe as $item) : ?>
        <tr>
          
          <td><?= $item['nama_obat'] ?></td>
          <td></td>
          <td></td>
          <td><?= $item['quantity'] ?></td>
          <td><?= "Rp " . number_format($item['price'], 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
        
        <tr>
          <td colspan="3" class="align-top px-4 py-3">
            <p class="mb-2">
              <span class="me-1 fw-medium">Salesperson:</span>
              <span>Alfie Solomons</span>
            </p>
            <span>Thanks for your business</span>
          </td>
          <td class="text-end px-4 py-3">
            <p class="mb-2">General practitioner services:</p>
           
            <p class="mb-0">Total:</p>
          </td>
          <td class="px-4 py-3">
            <p class="fw-medium mb-2">Rp 50.000</p>
           
            <p class="fw-medium mb-0"><?= "Rp " . number_format($patient['total'], 0, ',', '.') ?></p>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="row">
    <div class="col-12">
      <span class="fw-medium">Note:</span>
      <span>It was a pleasure working with you and your team. We hope you will keep us in mind for future
        freelance projects. Thank You!</span>
    </div>
  </div>
</div>


<!-- / Content -->

  
  <div class="buy-now">
    <a href="https://themeselection.com/item/sneat-bootstrap-html-admin-template/" target="_blank" class="btn btn-danger btn-buy-now">Buy Now</a>
  </div>
  

  

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  
  <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/popper/popper.js"></script>
  <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/js/bootstrap.js"></script>
  <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/hammer/hammer.js"></script>
  <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/i18n/i18n.js"></script>
  <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/typeahead-js/typeahead.js"></script>
  <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/js/menu.js"></script>
  
  <!-- endbuild -->

  <!-- Vendors JS -->
  
  

  <!-- Main JS -->
  <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/js/main.js"></script>
  

  <!-- Page JS -->
  <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/js/app-invoice-print.js"></script>
  
</body>

</html>

<!-- beautify ignore:end -->

