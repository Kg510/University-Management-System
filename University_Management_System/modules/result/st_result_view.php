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

if (isset($_REQUEST['vr'])) {
    $stid = $_REQUEST['vr'];
    $name = $_REQUEST['vn'];
}

$pageTitle = "Student Result";
include "../../includes/headertop_admin.php";

// Grade Point + Credit Hour Functions
function credit_hour($x) {
    if ($x == "DBMS") return 3;
    elseif ($x == "DBMS Lab") return 1;
    elseif ($x == "Mathematics") return 4;
    elseif ($x == "Programming") return 3;
    elseif ($x == "Programming Lab") return 1;
    elseif ($x == "English") return 4;
    elseif ($x == "Physics") return 3;
    elseif ($x == "Chemistry") return 3;
    elseif ($x == "Psychology") return 3;
}

function grade_point($gd) {
    if ($gd < 60) return 0;
    elseif ($gd < 70) return 1;
    elseif ($gd < 80) return 2;
    elseif ($gd < 90) return 3;
    elseif ($gd <= 100) return 4;
}
?>

<div class="all_student fix">
    <p style="text-align:center;color:#fff;background:purple;margin:0;padding:8px;">
        <?php echo "Name: $name<br>Student ID: $stid"; ?>
    </p>

    <p style="text-align:center;margin:10px;">
        <a href="view_cgpa.php?vr=<?php echo $stid; ?>&vn=<?php echo $name; ?>">
            <button class="editbtn">View CGPA & Completed Courses</button>
        </a>
    </p>

    <form action="" method="post" style="width:23%;margin:0 auto;padding-bottom:10px;">
        <select name="seme">
            <option value="1st">1st Semester</option>
            <option value="2nd">2nd Semester</option>
            <option value="3rd">3rd Semester</option>
        </select>
        <input type="submit" value="View Result" />
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $semester = $_POST['seme'];
        $i = 0; $ch = 0; $gp = 0;
        $get_result = $user->show_marks($stid, $semester);

        if ($get_result) {
            echo "<p style='text-align:center;background:#ddd;color:#01C3AA;padding:5px;width:84%;margin:0 auto'>
                  $semester Semester Result</p>";
    ?>
            <table class="tab_two" style="text-align:center;width:85%;margin:0 auto;">
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Grade</th>
                    <th>Credit hr.</th>
                    <th>Status</th>
                </tr>

                <?php while ($rows = $get_result->fetch_assoc()) {
                    $i++;
                    $mark = $rows['marks'];
                    $credit = credit_hour($rows['sub']);
                    $grade = grade_point($mark);
                    $ch += $credit;
                    $gp += ($credit * $grade);
                ?>
                    <tr>
                        <td><?php echo $rows['sub']; ?></td>
                        <td><?php echo $mark; ?></td>
                        <td>
                            <?php
                            if ($mark < 60) echo "F";
                            elseif ($mark < 70) echo "D";
                            elseif ($mark < 80) echo "C";
                            elseif ($mark < 90) echo "B";
                            elseif ($mark <= 100) echo "A";
                            ?>
                        </td>
                        <td><?php echo $credit; ?></td>
                        <td>
                            <?php
                            if ($mark < 60) {
                                echo "<span style='background:red;padding:3px 11px;color:#fff;'>Fail</span>";
                            } elseif ($mark < 70) {
                                echo "<span style='background:yellow'>Retake</span>";
                            } else {
                                echo "<span style='background:green;padding:3px 6px;color:#fff;'>Pass</span>";
                            }
                            ?>
                        </td>
                    </tr>
                <?php } ?>

                <tr>
                    <td colspan="2">SGPA:</td>
                    <td colspan="2">
                        <?php
                        $sg = $gp / $ch;
                        echo "<span style='color:green;font-size:20px;'>" . round($sg, 2) . "</span>";
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($sg >= 3.5) {
                            echo "<span style='background:purple;padding:3px 6px;color:#fff;'>Excellent</span>";
                        } elseif ($sg >= 3.0) {
                            echo "<span style='background:green;padding:3px 6px;color:#fff;'>Good</span>";
                        } elseif ($sg >= 2.5) {
                            echo "<span style='background:gray;padding:3px 6px;color:#fff;'>Average</span>";
                        } else {
                            echo "<span style='background:red;padding:3px 6px;color:#fff;'>Probation</span>";
                        }
                        ?>
                    </td>
                </tr>
            </table>

            <p style="float:left; margin:20px 0; width:49%; text-align:right;">
                <a href="st_result_update.php?ar=<?php echo $stid ?>&seme=<?php echo $semester ?>&vn=<?php echo $name ?>">
                    <button class="editbtn">Edit Result</button>
                </a>
            </p>
    <?php
        } else {
            echo "<p style='color:red;text-align:center'>No results found for this semester.</p>";
        }
    }
    ?>

    <p style="float:right; margin:20px 0; width:49%; text-align:left;">
        <a href="st_result.php"><button class="editbtn">Back to List</button></a>
    </p>
</div>

<?php
include "../../includes/footerbottom.php";
ob_end_flush();
?>
