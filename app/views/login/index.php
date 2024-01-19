<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?= BASEURL; ?>/assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Login Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/vendor/css/pages/page-auth.css" />

  <!-- Helpers -->
  <script src="<?= BASEURL; ?>/assets/vendor/js/helpers.js"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="<?= BASEURL; ?>/assets/js/config.js"></script>
</head>

<body>
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <img src="<?= BASEURL; ?>/assets/img/icons/icon.svg" width="50" />
                </span>
                <span class="app-brand-text demo text-body fw-bolder">SEECARE</span>
              </a>
            </div>

            <!-- /Logo -->
            <h4 class="mb-2">Welcome ! 👋</h4>
            <p class="mb-4">Please sign-in to your account</p>
            <div class="card-body text-center">
              <?php Flasher::flash(); ?>
            </div>
            <form id="formAuthentication" class="mb-3" action="<?= BASEURL ?>/login/process" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a href="auth-forgot-password-basic.html">
                    <small>Forgot Password?</small>
                  </a>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="············" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
              </div>
            </form>
            <p class="text-center">
              <span>New on our platform?</span>
              <a href="<?= BASEURL; ?>/register">
                <span>Create an account</span>
              </a>
            </p>

            <div class="d-flex align-items-center">
              <div class="flex-grow-1">
                <p class="mb-0"><b>Admin:</b></p>
                <p class="mb-0 email" data-email="admin@themesbrand.website">email - admin@themesbrand.website</p>
                <p class="mb-1 pass" data-password="admin@123456">Pass - admin@123456</p>
              </div>
              <div class="flex-shrink-0">
                <a href="javascript:void(0);" class="btn btn-primary login-btn" onclick="login(this)">Login</a>
              </div>
            </div>

            <!-- Repeat similar changes for other user types -->

            
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->

  <script src="<?= BASEURL; ?>/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="<?= BASEURL; ?>/assets/vendor/libs/popper/popper.js"></script>
  <script src="<?= BASEURL; ?>/assets/vendor/js/bootstrap.js"></script>
  <script src="<?= BASEURL; ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?= BASEURL; ?>/assets/vendor/js/menu.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="<?= BASEURL; ?>/assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <script>
    function login(element) {
        // Get the email and password from the clicked button's data attributes
        var email = element.closest('.d-flex').querySelector('.email').getAttribute('data-email');
        var password = element.closest('.d-flex').querySelector('.pass').getAttribute('data-password');

        // Set the email and password in the form fields
        document.getElementById('email').value = email;
        document.getElementById('password').value = password;
    }
  </script>
</body>

</html>
