<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Finance Mobile Application-UX/UI Design Screen One</title>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">

  <!-- Custom Styles -->
  <link rel="stylesheet" href="../assets/style.css"></head>
<body>
  <!-- Bootstrap Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Main Brand -->
        <a class="navbar-brand" href="../public/index.php">NovativSolutions</a>

        <!-- Toggle for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Users Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="usersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Users
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="usersDropdown">
                        <li><a class="dropdown-item" href="../public/add_user.php">Add User</a></li>
                        <li><a class="dropdown-item" href="../public/update_user.php">Update User</a></li>
                        <li><a class="dropdown-item" href="../public/delete_user.php">Delete User</a></li>
                        <li><a class="dropdown-item" href="../public/view_users.php">View Users</a></li>
                    </ul>
                </li>

                <!-- Appointments Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="appointmentsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Appointments
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="appointmentsDropdown">
                        <li><a class="dropdown-item" href="../public/add_appointment.php">Add Appointment</a></li>
                        <li><a class="dropdown-item" href="../public/update_appointment.php">Update Appointment</a></li>
                        <li><a class="dropdown-item" href="../public/delete_appointment.php">Delete Appointment</a></li>
                        <li><a class="dropdown-item" href="../public/view_appointments.php">View Appointments</a></li>
                    </ul>
                </li>

                <!-- Medical Records Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="recordsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Medical Records
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="recordsDropdown">
                        <li><a class="dropdown-item" href="../public/add_record.php">Add Record</a></li>
                        <li><a class="dropdown-item" href="../public/update_record.php">Update Record</a></li>
                        <li><a class="dropdown-item" href="../public/delete_record.php">Delete Record</a></li>
                        <li><a class="dropdown-item" href="../public/view_records.php">View Records</a></li>
                    </ul>
                </li>

                <!-- Login and Signup -->
                <li class="nav-item">
                    <a class="nav-link" href="../public/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/signup.php">Signup</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
