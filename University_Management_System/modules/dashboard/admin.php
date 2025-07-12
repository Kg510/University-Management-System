<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";

$user = new login_registration_class();
$admin_id = $_SESSION['admin_id'] ?? null;
$admin_name = $_SESSION['admin_name'] ?? null;

// Redirect to homepage if session not active
if (!$user->get_admin_session()) {
    header('Location: ../../index.php');
    exit();
}

$pageTitle = "Admin Dashboard";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>

    <div class="admin_profile">
        <h2 style="text-align:center; background:#1abc9c; color:white; padding:15px;">
            Welcome, <?php echo $admin_name; ?> (Admin)
        </h2>

        <!-- Student Management Section -->
        <div class="section" style="padding: 20px;">
            <h3>🎓 Student Management</h3>
            <ul>
                <li><a href="../student/admin_all_student.php">📋 View All Students</a></li>
                <li><a href="../result/st_result_view.php">📊 View Student Result</a></li>
                <li><a href="../attendance/att_add_admin.php">🗓️ Mark Attendance</a></li>
                <li><a href="#">⬇️ Download Student List (PDF - coming soon)</a></li>
            </ul>
        </div>

        <!-- Faculty Management Section -->
        <div class="section" style="padding: 20px;">
            <h3>👩‍🏫 Faculty Management</h3>
            <ul>
                <li><a href="../faculty/admin_all_faculty.php">👨‍🏫 View Faculty Details</a></li>
                <li><a href="#">📘 Faculty Information (coming soon)</a></li>
                <li><a href="#">🔍 Search Faculty (coming soon)</a></li>
                <li><a href="#">⬇️ Download Faculty List (PDF - coming soon)</a></li>
            </ul>
        </div>
    </div>

</body>
</html>
