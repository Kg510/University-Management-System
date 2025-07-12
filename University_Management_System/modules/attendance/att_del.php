<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";

$user = new login_registration_class();
if (!$user->get_admin_session()) {
    header('Location: ../../index.php');
    exit();
}

if (isset($_GET['dl'])) {
    $id = $_GET['dl'];
    $sql = "DELETE FROM attn WHERE id = '$id'";
    if ($user->conn->query($sql)) {
        header("Location: att_add_admin.php?res=deleted");
    } else {
        echo "Error deleting record.";
    }
} else {
    header("Location: att_add_admin.php");
}
?>
