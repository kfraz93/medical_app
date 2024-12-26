<?php include "../includes/db.php"; ?>
<?php include "../includes/header.php"; ?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Medical Records Management - Delete a Medical Record</p>
        </div>

        <div class="form-content">
            <!-- Delete Medical Record Form -->
            <form method="POST" action="../includes/medical_records.php">
                <h4>Delete Medical Record</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="number" class="form-control" name="record_id" placeholder="Record ID *" required />
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btnSubmit btn btn-danger">Delete Medical Record</button>
            </form>
            <br>
        </div>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
