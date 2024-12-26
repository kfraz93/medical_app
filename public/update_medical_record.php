<?php include "../includes/db.php"; ?>
<?php include "../includes/header.php"; ?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Medical Records Management - Update a Medical Record</p>
        </div>

        <div class="form-content">
            <!-- Update Medical Record Form -->
            <form method="POST" action="../includes/medical_records.php">
                <h4>Update Medical Record</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="number" class="form-control" name="record_id" placeholder="Record ID *" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="number" class="form-control" name="user_id" placeholder="User ID" />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="diagnosis" placeholder="Diagnosis" />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="prescription" placeholder="Prescription" />
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btnSubmit btn btn-warning">Update Medical Record</button>
            </form>
            <br>
        </div>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
