<?php include "../includes/db.php"; ?>
<?php include "../includes/header.php"; ?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Medical Records Management - Interact with the Medical Records API</p>
        </div>

        <div class="form-content">
            <!-- Fetch Medical Record -->
            <form method="GET" action="../includes/medical_records.php">
                <h4>Fetch Medical Record by ID</h4>
                <div class="form-group">
                    <input type="number" class="form-control" name="record_id" placeholder="Record ID" />
                </div>
                <br>
                <button type="submit" class="btnSubmit btn btn-primary">Fetch Medical Record</button>
            </form>
        </div>
    </div>
</div>
<?php
include "../includes/footer.php";
?>