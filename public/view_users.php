<?php include "../includes/header.php"; ?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Interact with the Users API - View User</p>
        </div>

        <div class="form-content">
            <!-- View User Form -->
            <form id="view_user_form">
                <h4>View User</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_id" placeholder="User ID *" required />
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btnSubmit btn btn-info">View User</button>
            </form>

            <!-- Display User Information -->
            <div id="user_info" class="mt-3">
                <!-- Fetched user data will appear here -->
            </div>
        </div>
    </div>
</div>

<script src="../js/users.js"></script>
<?php
include "../includes/footer.php";
?>