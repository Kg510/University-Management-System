<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";


$user = new login_registration_class();

$fid    = $_SESSION['f_id'];
$funame = $_SESSION['f_uname'];
$fname  = $_SESSION['f_name'];

if (!$user->get_faculty_session()) {
    header('Location: ../login/faculty_login.php');
    exit();
}

$pageTitle = "Take Attendance";
include "../../includes/headertop.php";
?>

<div class="all_student fix">
    <h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:#1abc9c">Take Attendance</h3>

    <div class="fix" style="background:#ddd;padding:20px;">
        <span style="text-align:center;">
            <a href="att_view_fc.php">
                <button style="background:#58A85D;border:none;color:#fff;padding:10px;">View Attendance</button>
            </a>
        </span>
    </div>

    <?php
    if (isset($_REQUEST['res'])) {
        echo "<h3 style='color:green;text-align:center;'>Data deleted successfully!</h3>";
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cur_date = $_POST['attndate'];
        $atten    = $_POST['attn'];
        $res      = $user->insertattn($cur_date, $atten);

        if ($res) {
            echo "<h3 style='color:green;text-align:center;'>Attendance successfully inserted!</h3>";
        } else {
            echo "<p style='color:red;text-align:center;'>Failed to insert data</p>";
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
                        <label style="color:red;font-size:16px;">
                            <input type="radio" name="attn[<?php echo $rows['st_id']; ?>]" value="absent" checked /> Absent
                        </label>
                        <label style="color:green;font-size:16px;">
                            <input type="radio" name="attn[<?php echo $rows['st_id']; ?>]" value="present" /> Present
                        </label>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <div style="text-align:center;margin-top:20px;">
            <input type="submit" name="submit" value="Submit" style="background:#58A85D;border:none;color:#fff;padding:10px 40px;" />
        </div>
    </form>
</div>

<?php
include "../../includes/footerbottom.php";
ob_end_flush();
?>
