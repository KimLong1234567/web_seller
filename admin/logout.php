<?php
if (isset($_SESSION["admin_name"])) {
    setcookie("userId", "", time() - 86400, "/");
    setcookie("userName", "", time() - 86400, "/");
    setcookie("userPhone", "", time() - 86400, "/");
}
header("Location: ../index.php");
