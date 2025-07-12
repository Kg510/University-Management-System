<?php
ob_start();
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

$pageTitle = "All Student Details";
include "../../includes/headertop_admin.php";
?>

<div class="all_student">
    <div class="search_st">
        <div class="hdinfo">
            <h3>All Registered Student List</h3>
        </div>
        <div class="search">
            <form action="admin_search_student.php" method="GET">
                <input type="text" name="src_student" placeholder="Search student" />
                <input type="submit" value="Search" />
            </form>
        </div>
    </div>

    <?php if (isset($_GET['res']) && $_GET['res'] == 1): ?>
        <h3 style="color:green;text-align:center;margin:0;padding:10px;">Student deleted successfully!</h3>
    <?php endif; ?>

    <table class="tab_one">
        <thead style="background:#2980b9; color:white;">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>ID</th>
                <th>Show Profile</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $alluser = $user->get_all_student();
            while ($rows = $alluser->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td><?php echo $rows['st_id']; ?></td>
                    <td><a href="admin_single_student.php?id=<?php echo $rows['st_id']; ?>">View</a></td>
                    <td><a href="admin_single_student_update.php?id=<?php echo $rows['st_id']; ?>">Edit</a></td>
                    <td><a href="admin_delete_student.php?id=<?php echo $rows['st_id']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a></td>
                    <td>
                        <img src="../../assets/img/student/<?php echo $rows['img']; ?>" width="50" height="50" title="<?php echo $rows['name']; ?>">
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
include "../../includes/footerbottom.php";
ob_end_flush();
?>
