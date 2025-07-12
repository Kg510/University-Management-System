<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";

$user = new login_registration_class();
$admin_id = $_SESSION['admin_id'] ?? null;
$admin_name = $_SESSION['admin_name'] ?? null;

if (!$user->get_admin_session()) {
    header('Location: ../../index.php');
    exit();
}

$pageTitle = "All Faculty Details";
include "../../includes/headertop_admin.php";
?>

<div class="all_student">
    <div class="search_st">
        <div class="hdinfo">
            <h3 style="text-align:center; background:#1abc9c; color:white; padding:10px;">All Registered Faculty List</h3>
        </div>
    </div>

    <table class="tab_one" style="width: 100%; text-align: center; margin-top: 20px;">
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Education</th>
            <th>Address</th>
            <th>Birthday</th>
        </tr>

        <?php
        $i = 0;
        $alluser = $user->get_faculty();

        if ($alluser && $alluser->num_rows > 0) {
            while ($rows = $alluser->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td><?php echo $rows['email']; ?></td>
                    <td><?php echo $rows['contact']; ?></td>
                    <td><?php echo $rows['education']; ?></td>
                    <td><?php echo $rows['address']; ?></td>
                    <td><?php echo $rows['birthday']; ?></td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='7' style='color:red;'>No faculty data found.</td></tr>";
        }
        ?>
    </table>
</div>

<?php include "../../includes/footerbottom.php"; ?>
