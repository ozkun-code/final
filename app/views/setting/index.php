<!-- setting/index.php -->

<?php
// Gunakan data dari $data['settings'] dan $data['user']
$settings = $data['settings'];
$user = $data['user'];
?>

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Account Settings /</span> Account
        </h4>
        <div class="row fv-plugins-icon-container">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a></li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <hr class="my-0">
                    <div class="card-body">
                        <form id="formAccountSettings" action="/setting/updateAccount" method="POST" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                            <div class="row">
                                <div class="mb-3 col-md-6 fv-plugins-icon-container">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $settings['first_name']; ?>">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                                <div class="mb-3 col-md-6 fv-plugins-icon-container">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input class="form-control" type="text" name="last_name" id="lastName" value="<?php echo $settings['last_name']; ?>">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="phoneNumber">Contact</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"></span>
                                        <input type="text" id="phoneNumber" name="contact" class="form-control" value="<?php echo $settings['contact']; ?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password">Create New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" value="">
                                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">See</button>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                    <?php Flasher::flash(); ?>
                </div>
                                <!-- ... tambahkan kolom lain yang Anda perlukan ... -->
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                </div>
                                <input type="hidden">
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var seeButton = document.querySelector(".btn-outline-secondary");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            seeButton.textContent = "Hide";
        } else {
            passwordField.type = "password";
            seeButton.textContent = "See";
        }
    }
</script>
