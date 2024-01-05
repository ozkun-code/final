<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4">
<span class="text-muted fw-light">DataTables /</span> Basic
</h4>
    <!-- start page title -->

    <!-- end page title -->
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <!-- Tombol New Appointment dipindahkan ke sini -->
            <a href="https://doctorly.themesbrand.website/appointment-create"
              class="btn btn-primary text-white waves-effect waves-light mb-4">
              <i class="bx bx-plus font-size-16 align-middle me-2"></i> New Appointment
            </a>
            <div id='calendar'></div>
          </div>
        </div>
      </div> <!-- end col -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Appointment List | <label
              id="selected_date">04 Jan, 2024</label>
            </h4>
            <div id="appointment_list">
              <!-- Tabel janji (appointments) -->
            </div>
            <div id="new_list" style="display : none"></div>
          </div>
        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->
  </div> <!-- content -->
</div>
