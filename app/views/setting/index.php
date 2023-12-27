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
                    <li class="nav-item"><a class="nav-link" href="pages-account-settings-security.html"><i class="bx bx-lock-alt me-1"></i> Security</a></li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="../../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                                </label>
                                <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <form id="formAccountSettings" method="GET" onsubmit="return false" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                            <div class="row">
                                <div class="mb-3 col-md-6 fv-plugins-icon-container">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input class="form-control" type="text" id="first_Name" name="first_Name" value="John" autofocus="">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                                <div class="mb-3 col-md-6 fv-plugins-icon-container">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input class="form-control" type="text" name="lastName" id="lastName" value="Doe">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label" for="phoneNumber">Contact</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">IDN (+62)</span>
                                        <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="202 555 0111">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                </div>
                                <input type="hidden">
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
                <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                        <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-warning">
                                <h6 class="alert-heading fw-medium mb-1">Are you sure you want to delete your account?</h6>
                                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                            </div>
                        </div>
                        <form id="formAccountDeactivation" onsubmit="return false" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                            </div>
                            <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                            <input type="hidden">
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- / Content -->




    <div class="content-backdrop fade"></div>
</div>