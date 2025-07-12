<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";

$user = new login_registration_class();
if (!$user->get_admin_session()) {
    header("Location: ../../index.php");
    exit();
}

$st_id = $_GET['id'] ?? '';
if ($st_id) {
    $sql = "DELETE FROM st_info WHERE st_id = '$st_id'";
    if ($user->conn->query($sql)) {
        header("Location: admin_all_student.php?res=1");
    } else {
        echo "<p style='text-align:center;color:red;'>Delete failed.</p>";
    }
} else {
    echo "<p style='text-align:center;color:red;'>No student selected.</p>";
}