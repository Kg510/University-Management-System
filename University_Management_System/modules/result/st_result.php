<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";


$user = new login_registration_class();
$admin_id = $_SESSION['admin_id'];
$admin_name = $_SESSION['admin_name'];

if (!$user->get_admin_session()) {
    header('Location: ../../index.php');
    exit();
}

$pageTitle = "All Students Result";
include "../../includes/headertop_admin.php";
?>

<div class="all_student">
    <h2 style="text-align:center; padding:10px; background:#2980b9; color:white;">
        View Student Results
    </h2>

    <table class="tab_one" style="margin: 20px auto; width: 90%; border: 1px solid #ccc;">
        <thead style="background: #27ae60; color: #fff;">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Student ID</th>
                <th>View Result</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $all_students = $user->get_all_student();
            if ($all_students->num_rows > 0) {
                while ($row = $all_students->fetch_assoc()) {
                    $i++;
            ?>
                    <tr style="text-align:center;">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['st_id']; ?></td>
                        <td>
                            <a href="st_result_view.php?vr=<?php echo $row['st_id']; ?>&vn=<?php echo urlencode($row['name']); ?>">
                                <button class="editbtn">View Result</button>
                            </a>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='4' style='text-align:center;color:red;'>No student data found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include "../../includes/footerbottom.php"; ?>
