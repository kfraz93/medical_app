<?php include "../includes/header.php"; ?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Interact with the Users API - Update User</p>
        </div>

        <div class="form-content">
            <!-- Update User Form -->
            <form id="update_user_form">
                <h4>Update User</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_id" placeholder="User ID *" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="New User Name" />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="New Email" />
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btnSubmit btn btn-warning">Update User</button>
            </form>
        </div>
    </div>
</div>
<?php
include "../includes/footer.php";
?>