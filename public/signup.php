<!DOCTYPE html>
<html lang="en">
<?php
include "../includes/db.php";
include "../includes/header.php";
?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Welcome to the Novativ Solutions portal</p>
        </div>

        <div class="form-content">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="User Name *" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="fullname" placeholder="First and Last Name *" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Your Email *" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Your Password *" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Repeat Password *" required />
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btnSubmit btn btn-primary">Signup</button>
            </form>
        </div>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $userName = $_POST['username'];
    $fullName = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate passwords match
    if ($password !== $confirmPassword) {
        echo "<div class='alert alert-danger text-center'>Passwords do not match!</div>";
    } else {
        try {
            // Insert data into the database using the $pdo object from db.php
            $sql = "INSERT INTO users (user_id, username, email, password) VALUES (:username, :fullname, :email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':username' => $userName,
                ':fullname' => $fullName,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT), // Secure password hashing
            ]);
            echo "<div class='alert alert-success text-center'>Registration successful!</div>";
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger text-center'>Error: " . $e->getMessage() . "</div>";
        }
    }
}
?>
<?php
include "../includes/footer.php";
?>