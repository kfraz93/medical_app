<?php include "../includes/db.php"; ?>
<?php include "../includes/header.php"; ?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Appointment Management - Delete an Appointment</p>
        </div>

        <div class="form-content">
            <!-- Delete Appointment Form -->
            <form method="POST" action="../includes/appointments.php">
                <h4>Delete Appointment</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="number" class="form-control" name="appointment_id" placeholder="Appointment ID *" required />
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btnSubmit btn btn-danger">Delete Appointment</button>
            </form>
            <br>
        </div>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
