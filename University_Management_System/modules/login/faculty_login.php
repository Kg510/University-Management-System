<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";

$user = new login_registration_class();

// Redirect if already logged in
if ($user->get_faculty_session()) {
    header('Location: ../dashboard/admin.php');
    exit();
}

$pageTitle = "Faculty Login";
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>
    <div class="loginform">
        <h3>Faculty Login</h3>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM faculty WHERE username = '$username' AND password = '$password'";
            $result = $user->conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['f_id'] = $row['id'];
                $_SESSION['f_uname'] = $row['username'];
                $_SESSION['f_name'] = $row['name'];
                header("Location: ../dashboard/admin.php");
            } else {
                echo "<p style='color:red;text-align:center;'>Invalid login details.</p>";
            }
        }
        ?>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>