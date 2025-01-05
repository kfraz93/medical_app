<?php include "../includes/header.php"; ?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Interact with the Users API - Update Password</p>
        </div>

        <div class="form-content">
            <!-- Update Password Form -->
            <form id="update_user_form">
                <h4>Update Password</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_id" placeholder="User ID *" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" class="form-control" name="current_password" placeholder="Current Password *" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" class="form-control" name="new_password" placeholder="New Password *" required />
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btnSubmit btn btn-warning">Update Password</button>
            </form>
        </div>
    </div>
</div>
<?php
include "../includes/footer.php";
?>
