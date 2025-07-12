<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";

$user = new login_registration_class();

$pageTitle = "Student Registration";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>

<div class="loginform fix" style="width: 400px; margin: 40px auto;">
    <div class="msg">
        <h3><i class="fa fa-user-plus" aria-hidden="true"></i> Student Registration</h3>
    </div>

    <div class="access">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $st_id = $_POST['st_id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $bday = $_POST['bday'];
            $program = $_POST['program'];
            $contact = $_POST['contact'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $img = null;

            // File upload handling
            if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
                $imgName = basename($_FILES["img"]["name"]);
                $targetPath = "../../assets/img/student/" . $imgName;

                if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetPath)) {
                    $img = $imgName;
                }
            }

            // Insert query
            $sql = "INSERT INTO st_info (st_id, name, password, email, bday, program, contact, gender, address, img)
                    VALUES ('$st_id', '$name', '$password', '$email', '$bday', '$program', '$contact', '$gender', '$address', '$img')";

            if ($user->conn->query($sql)) {
                echo "<p style='color:green;text-align:center;'>Registration successful!</p>";
            } else {
                echo "<p style='color:red;text-align:center;'>Error: " . $user->conn->error . "</p>";
            }
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="st_id" placeholder="Student ID" required />
            <input type="text" name="name" placeholder="Full Name" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="date" name="bday" required />
            <input type="text" name="program" placeholder="Program (e.g., BIT, BCA)" required />
            <input type="text" name="contact" placeholder="Contact Number" required />
            
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <textarea name="address" placeholder="Address" required></textarea>
            
            <label style="font-size: 14px;">Upload Photo</label>
            <input type="file" name="img" />

            <input type="submit" value="Register" />
        </form>
    </div>
</div>

</body>
</html>
