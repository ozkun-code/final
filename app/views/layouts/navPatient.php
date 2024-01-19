<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <img src="<?= BASEURL; ?>/assets/img/icons/icon.svg" width="45" />
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">SEECARE</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Patient</span>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
              <i class="menu-icon tf-icons bx bx-dna"></i>
              <div data-i18n="Misc">diagnosis
              </div>
            </a>
            
          </li>
     
          <li class="menu-header small text-uppercase"><span class="menu-header-text">User</span></li>
          <li class="menu-item">
            <a href="<?= BASEURL; ?>/setting" class="menu-link">
              <i class="menu-icon tf-icons bx bx-cog"></i>
              <div data-i18n="Basic">Setting</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= BASEURL; ?>/logout" class="menu-link">
              <i class="menu-icon tf-icons bx bx-log-out"></i>
              <div data-i18n="Basic">Logout</div>
            </a>
          </li>



        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          
        </nav>

        <!-- / Navbar -->