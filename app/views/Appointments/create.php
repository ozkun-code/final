<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Add Appointment</h4>

        <div class="card mb-8">
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h5 class="card-title">Patient and Date</h5>

                        <form action="<?= BASEURL; ?>/appointments/activeCreate" method="post">
                            <div class="mb-3">
                                <label for="selectpickerLiveSearch" class="form-label">Patient:</label>
                                <select id="selectpickerLiveSearch" class="selectpicker w-100" data-style="btn-default" data-live-search="true" name="patient_id" required>
                                    <?php foreach ($data['patients'] as $patient): ?>
                                        <option value="<?php echo $patient['id']; ?>" data-tokens="<?php echo $patient['first_name'] . ' ' . $patient['last_name']; ?>"><?php echo $patient['first_name'] . ' ' . $patient['last_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="date">Date:</label>
                                <input type="date" class="form-control" id="date" name="selected_date" value="<?= date('Y-m-d'); ?>" required>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <h5 class="card-title">Time Slots</h5>

                        <ul class="timeslots" style="display: flex; flex-wrap: wrap; margin-bottom: 1rem;">
                            <?php foreach ($data['timeslots'] as $timeslot) : ?>
                                <li class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-outline-primary ms-2" style="padding: 10px; width: 100px;" onclick="selectTime('<?= $timeslot; ?>')"><?= $timeslot; ?></button>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-100">Create Appointment</button>
                </div>
            </div>
        </div>

        <script>

$(".selectpicker").selectpicker();

                            function selectTime(time) {
                                // Menetapkan nilai slot waktu yang dipilih ke input tersembunyi
                                document.getElementById('selectedTime').value = time;

                                // Menonaktifkan tombol-tombol yang lain (opsional)
                                var buttons = document.querySelectorAll('.btn-outline-primary');
                                buttons.forEach(function(button) {
                                    button.classList.remove('active');
                                });

                                // Menandai tombol yang dipilih (opsional)
                                var selectedButton = document.querySelector('button[data-time="' + time + '"]');
                                if (selectedButton) {
                                    selectedButton.classList.add('active');
                                }
                            }
                        </script>
    </div>
</div>

       

