<?php

setcookie("token","", time() -3600, "/", "", true, true);
header('location:../public/login.php');

?>