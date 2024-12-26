<?php include "../includes/db.php"; ?>
<?php include "../includes/header.php"; ?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Appointment Management - Interact with the Appointments API</p>
        </div>

        <div class="form-content">
            <!-- Fetch Appointments -->
            <form method="GET" action="../includes/appointments.php">
                <h4>Fetch Appointment by ID</h4>
                <div class="form-group">
                    <input type="number" class="form-control" name="appointment_id" placeholder="Appointment ID" />
                </div>
                <br>
                <button type="submit" class="btnSubmit btn btn-primary">Fetch Appointment</button>
            </form>
        </div>
    </div>
</div>
<?php
include "../includes/footer.php";
?>