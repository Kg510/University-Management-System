<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";

$user = new login_registration_class();
if (!$user->get_faculty_session()) {
    header('Location: ../../index.php');
    exit();
}

$pageTitle = "View Attendance (Faculty)";
include "../../includes/headertop.php";
?>

<div class="all_student fix">
    <h3 style="text-align:center;color:#fff;background:#27ae60;padding:10px;">
        View Student Attendance (Faculty)
    </h3>

    <table class="tab_one" style="text-align:center;width:90%;margin:20px auto;">
        <tr>
            <th>SL</th>
            <th>Student ID</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php
        $i = 0;
        $sql = "SELECT * FROM attn ORDER BY at_date DESC";
        $result = $user->conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $i++;
                echo "<tr>
                        <td>$i</td>
                        <td>{$row['st_id']}</td>
                        <td>{$row['at_date']}</td>
                        <td>{$row['atten']}</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No attendance data found.</td></tr>";
        }
        ?>
    </table>
</div>

<?php include "../../includes/footerbottom.php"; ?>
