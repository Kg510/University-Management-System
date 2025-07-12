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

$stid = $_GET['ar'];
$semester = $_GET['seme'];
$name = $_GET['vn'];

$pageTitle = "Update Result";
include "../../includes/headertop_admin.php";

// Fetch existing results for the student and semester
$results = $user->show_marks($stid, $semester);
?>
<div class="all_student fix">
    <h3 style="text-align:center;color:#fff;background:#27ae60;padding:10px;">
        Update Result - <?php echo $name . " (" . $stid . ") - " . $semester; ?>
    </h3>

    <?php if ($results->num_rows > 0): ?>
        <form action="process_update.php" method="post" style="width:50%;margin:0 auto;">
            <input type="hidden" name="stid" value="<?php echo $stid; ?>">
            <input type="hidden" name="semester" value="<?php echo $semester; ?>">

            <table class="tab_one" style="width:100%; text-align:center;">
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                </tr>
                <?php while ($row = $results->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['sub']; ?></td>
                        <td>
                            <input type="number" name="marks[<?php echo $row['sub']; ?>]" value="<?php echo $row['marks']; ?>" min="0" max="100" required>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>

            <div style="text-align:center; margin-top:20px;">
                <input type="submit" name="update" value="Update Marks" style="padding:10px 30px; background:#1abc9c; color:white; border:none;">
            </div>
        </form>
    <?php else: ?>
        <p style="text-align:center; color:red;">No results found for <?php echo $semester; ?> semester.</p>
    <?php endif; ?>

    <p style="text-align:center; margin-top:20px;">
        <a href="st_result_view.php?vr=<?php echo $stid; ?>&vn=<?php echo $name; ?>">
            <button class="editbtn">Back to Result</button>
        </a>
    </p>
</div>

<?php include "../../includes/footerbottom.php"; ?>
