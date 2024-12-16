<?php include "../includes/header.php"; ?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Interact with the Users API</p>
        </div>

        <div class="form-content">
            <!-- Add User Form -->
            <form id="add_user_form">
                <h4>Add User</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_id" placeholder="User ID *" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="User Name *" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email *" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password *" required />
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btnSubmit btn btn-primary">Add User</button>
            </form>
        </div>
    </div>
</div>
<?php
include "../includes/footer.php";
?>
