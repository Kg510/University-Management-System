<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";

$user = new login_registration_class();
if (!$user->get_admin_session()) {
    header("Location: ../../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stid = $_POST['stid'];
    $semester = $_POST['semester'];
    $marks = $_POST['marks'];

    foreach ($marks as $subject => $mark) {
        $mark = intval($mark);
        $subject = trim($subject);

        // Check if the result exists
        $check = $user->conn->query("SELECT * FROM result WHERE st_id='$stid' AND semester='$semester' AND sub='$subject'");
        if ($check->num_rows > 0) {
            // Update existing mark
            $user->conn->query("UPDATE result SET marks='$mark' WHERE st_id='$stid' AND semester='$semester' AND sub='$subject'");
        } else {
            // Optional: insert if not exists
            $user->conn->query("INSERT INTO result (st_id, marks, sub, semester) VALUES ('$stid', '$mark', '$subject', '$semester')");
        }
    }

    header("Location: st_result_view.php?vr=$stid&vn=" . urlencode($_SESSION['admin_name']));
    exit();
} else {
    echo "Invalid request.";
}
