<?php


if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin") {
        header("location:views/home_admin.php");
    } else if ($_SESSION['role'] == "sekretaris") {
        header("location:views/home_sekretaris.php");
    } else {
        echo '';
    }
}

?>