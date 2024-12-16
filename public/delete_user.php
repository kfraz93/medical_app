<?php include "../includes/header.php"; ?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Interact with the Users API - Delete User</p>
        </div>

        <div class="form-content">
            <!-- Delete User Form -->
            <form id="delete_user_form">
                <h4>Delete User</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_id" placeholder="User ID *" required />
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btnSubmit btn btn-danger">Delete User</button>
            </form>
        </div>
    </div>
</div>
<?php
include "../includes/footer.php";
?>