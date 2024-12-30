<?php include '../includes/header.php'; ?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Welcome to the Novativ Solutions login</p>
        </div>
        <div class="form-content">
            <div id="error-message" class="alert alert-danger" style="display: none;"></div>
            <form id="login-form">
                <div class="form-group">
                    <input type="text" name="user_id" id="user_id" class="form-control" placeholder="User ID *" required />
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password *" required />
                </div>
                <br>
                <button type="submit" name="login-submit" class="btnSubmit btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
<script src="../js/login.js"></script>
</body>
</html>
