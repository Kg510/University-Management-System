<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";

$user = new login_registration_class();

// If already logged in
if ($user->get_admin_session()) {
    header('Location: ../dashboard/admin.php');
    exit();
}

$pageTitle = "Admin Login";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="loginform fix">
    <div class="msg">
        <h3><i class="fa fa-user"></i> Admin Login</h3>
    </div>

    <div class="access">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                echo "<p style='color:red; text-align:center;'>Fields must not be empty.</p>";
            } else {
                $password = md5($password);
                $login = $user->admin_userlogin($username, $password);

                if ($login) {
                    header("Location: ../dashboard/admin.php");
                    exit();
                } else {
                    echo "<p style='color:red; text-align:center;'>Incorrect username or password</p>";
                }
            }
        }
        ?>

        <form action="" method="post">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" value="Login" />
        </form>
    </div>
</div>

</body>
</html>
