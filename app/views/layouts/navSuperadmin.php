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
          <!-- Dashboards -->
          <li class="menu-item">
            <a href="<?php BASEURL; ?>/dashboard" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Dashboards">Dashboards</div>
            </a>

          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Center</span>
          </li>
          <!-- Apps -->

          <!-- Pages -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-user-voice"></i>
              <div data-i18n="Account Settings">Admin</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="<?= BASEURL; ?>/admin" class="menu-link">
                  <div data-i18n="Account">Data Admin</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?= BASEURL; ?>/admin/create" class="menu-link">
                  <div data-i18n="Notifications">Add Admin</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-heart"></i>
              <div data-i18n="Authentications">Doctors</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="<?= BASEURL; ?>/doctors" class="menu-link">
                  <div data-i18n="Basic">List Doctors</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?= BASEURL; ?>/doctors/create" class="menu-link">
                  <div data-i18n="Basic">Add Doctors</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-capsule"></i>
              <div data-i18n="Misc">Drug</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="<?= BASEURL; ?>/drug" class="menu-link">
                  <div data-i18n="Error">List Drug</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?= BASEURL; ?>/admin/create" class="menu-link">
                  <div data-i18n="Under Maintenance">Add Drug</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="<?= BASEURL; ?>/patients" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div data-i18n="Error">List Patients</div>
            </a>
          </li>

          <!-- Components -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Transactions</span></li>
          <!-- Cards -->
          <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
              <i class="menu-icon tf-icons bx bx-food-menu"></i>
              <div data-i18n="Basic">Data Transaction</div>
            </a>
          </li>
          <li class="menu-header small text-uppercase"><span class="menu-header-text">User</span></li>
          <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
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

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">

            </ul>
          </div>
        </nav>

        <!-- / Navbar -->