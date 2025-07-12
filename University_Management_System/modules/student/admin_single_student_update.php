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
$sql = "SELECT * FROM st_info WHERE st_id = '$st_id'";
$result = $user->conn->query($sql);
$student = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $program = $_POST['program'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $updateSql = "UPDATE st_info SET name='$name', email='$email', program='$program', contact='$contact', gender='$gender', address='$address' WHERE st_id = '$st_id'";
    if ($user->conn->query($updateSql)) {
        header("Location: admin_all_student.php");
        exit();
    } else {
        $error = "Update failed.";
    }
}

$pageTitle = "Edit Student";
include "../../includes/headertop_admin.php";
?>
<div class="all_student">
    <h2 style="text-align:center;background:#2980b9;color:white;padding:10px;">Edit Student</h2>
    <form action="" method="POST" style="width: 60%; margin: auto;">
        <label>Name:</label><input type="text" name="name" value="<?php echo $student['name']; ?>" required><br>
        <label>Email:</label><input type="email" name="email" value="<?php echo $student['email']; ?>" required><br>
        <label>Program:</label><input type="text" name="program" value="<?php echo $student['program']; ?>" required><br>
        <label>Contact:</label><input type="text" name="contact" value="<?php echo $student['contact']; ?>" required><br>
        <label>Gender:</label>
        <select name="gender">
            <option value="male" <?php if($student['gender']=="male") echo "selected"; ?>>Male</option>
            <option value="female" <?php if($student['gender']=="female") echo "selected"; ?>>Female</option>
        </select><br>
        <label>Address:</label><textarea name="address"><?php echo $student['address']; ?></textarea><br>
        <input type="submit" value="Update">
    </form>
    <?php if (isset($error)) echo "<p style='color:red;text-align:center;'>$error</p>"; ?>
</div>
<?php include "../../includes/footerbottom.php"; ?>