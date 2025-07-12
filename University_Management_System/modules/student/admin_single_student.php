<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";

$user = new login_registration_class();

if (!$user->get_admin_session()) {
    header("Location: ../../index.php");
    exit();
}

$pageTitle = "Student Details";
$st_id = $_GET['id'] ?? '';
$sql = "SELECT * FROM st_info WHERE st_id = '$st_id'";
$result = $user->conn->query($sql);
$student = $result->fetch_assoc();

include "../../includes/headertop_admin.php";
?>
<div class="all_student">
    <h2 style="text-align:center;background:#2980b9;color:white;padding:10px;">Student Details</h2>
    <?php if ($student): ?>
    <table class="tab_one" style="width: 60%; margin: auto;">
        <tr><th>ID</th><td><?php echo $student['st_id']; ?></td></tr>
        <tr><th>Name</th><td><?php echo $student['name']; ?></td></tr>
        <tr><th>Email</th><td><?php echo $student['email']; ?></td></tr>
        <tr><th>Program</th><td><?php echo $student['program']; ?></td></tr>
        <tr><th>Gender</th><td><?php echo $student['gender']; ?></td></tr>
        <tr><th>Contact</th><td><?php echo $student['contact']; ?></td></tr>
        <tr><th>Birthday</th><td><?php echo $student['bday']; ?></td></tr>
        <tr><th>Address</th><td><?php echo $student['address']; ?></td></tr>
        <tr><th>Photo</th><td><img src="../../assets/img/student/<?php echo $student['img']; ?>" width="100"></td></tr>
    </table>
    <?php else: ?>
        <p style="text-align:center;color:red;">Student not found.</p>
    <?php endif; ?>
</div>
<?php include "../../includes/footerbottom.php"; ?>