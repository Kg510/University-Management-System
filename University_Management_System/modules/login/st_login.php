<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";

$user = new login_registration_class();

if ($user->get_student_session()) {
    header("Location: ../dashboard/admin.php");
    exit();
}

$pageTitle = "Student Login";
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>
    <div class="loginform">
        <h3>Student Login</h3>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $st_id = $_POST['st_id'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM st_info WHERE st_id = '$st_id' AND password = '$password'";
            $result = $user->conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['st_id'] = $row['st_id'];
                $_SESSION['st_name'] = $row['name'];
                header("Location: ../dashboard/admin.php"); // Replace with student dashboard
            } else {
                echo "<p style='color:red;text-align:center;'>Invalid student ID or password.</p>";
            }
        }
        ?>
        <form action="" method="post">
            <input type="text" name="st_id" placeholder="Student ID" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
