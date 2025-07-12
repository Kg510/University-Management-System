<?php
ob_start();
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

$pageTitle = "Faculty Attendance";
include "../../includes/headertop_admin.php";
?>

<div class="all_student fix">
    <h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:#1abc9c">Faculty Attendance Management</h3>

    <div class="fix" style="background:#ddd;padding:20px;">
        <span style="float:left;">
            <a href="att_add_admin.php">
                <button style="background:#58A85D;border:none;color:#fff;padding:10px;">Add Student</button>
            </a>
        </span>
        <span style="float:right;">
            <a href="att_view.php">
                <button style="background:#58A85D;border:none;color:#fff;padding:10px;">View Attendance</button>
            </a>
        </span>
    </div>

    <?php
    if (isset($_REQUEST['res'])) {
        echo "<h3 style='color:green;text-align:center'>Data deleted successfully!</h3>";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cur_date = $_POST['attndate'];
        $atten = $_POST['attn'];
        $res = $user->insertattn($cur_date, $atten);

        if ($res) {
            echo "<h3 style='color:green;text-align:center'>Attendance successfully inserted!</h3>";
        } else {
            echo "<p style='color:red;text-align:center'>Failed to insert data</p>";
        }
    }
    ?>

    <form action="" method="post">
        <p style="text-align:center;color:#34495e;">
            <mark>Select date: <input type="date" name="attndate" required /></mark>
        </p>

        <table class="tab_one" style="text-align:center;">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>ID</th>
                <th>Attendance</th>
                <th>Delete</th>
            </tr>

            <?php
            $i = 0;
            $alluser = $user->attn_student();
            while ($rows = $alluser->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td><?php echo $rows['st_id']; ?></td>
                    <td>
                        <label style="color:red;">
                            <input type="radio" name="attn[<?php echo $rows['st_id']; ?>]" value="absent" checked /> Absent
                        </label>
                        <label style="color:green;">
                            <input type="radio" name="attn[<?php echo $rows['st_id']; ?>]" value="present" /> Present
                        </label>
                    </td>
                    <td>
                        <a href="att_del.php?dl=<?php echo $rows['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <center>
            <input style="background:#58A85D;border:none;color:#fff;padding:8px 100px;" type="submit" name="submit" value="Submit" />
        </center>
    </form>
</div>

<?php include "../../includes/footerbottom.php"; ?>
