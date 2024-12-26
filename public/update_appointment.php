<?php include "../includes/db.php"; ?>
<?php include "../includes/header.php"; ?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Appointment Management - Update an Appointment</p>
        </div>

        <div class="form-content">
            <!-- Update Appointment Form -->
            <form method="POST" action="../includes/appointments.php">
                <h4>Update Appointment</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="number" class="form-control" name="appointment_id" placeholder="Appointment ID *" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="number" class="form-control" name="user_id" placeholder="User ID" />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="doctor_name" placeholder="Doctor Name" />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="datetime-local" class="form-control" name="date_time" placeholder="New Date & Time" />
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btnSubmit btn btn-warning">Update Appointment</button>
            </form>
            <br>
        </div>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
