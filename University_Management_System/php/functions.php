<?php
class login_registration_class {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "university_db");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // ✅ Secure ADMIN LOGIN with Prepared Statements
    public function admin_userlogin($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['username'];
            return true;
        } else {
            return false;
        }
    }

    // ✅ Session Checkers
    public function get_admin_session() {
        return isset($_SESSION['admin_id']);
    }

    public function get_faculty_session() {
        return isset($_SESSION['f_id']);
    }

    public function get_student_session() {
        return isset($_SESSION['st_id']);
    }

    // ✅ Get All Students
    public function get_all_student() {
        $sql = "SELECT * FROM st_info";
        return $this->conn->query($sql);
    }

    // ✅ Get All Faculty
    public function get_faculty() {
        $sql = "SELECT * FROM faculty";
        return $this->conn->query($sql);
    }

    // ✅ Insert Attendance Safely
    public function insertattn($cur_date, $atten) {
        foreach ($atten as $st_id => $attn_status) {
            if (in_array($attn_status, ['present', 'absent'])) {
                $stmt = $this->conn->prepare("INSERT INTO attn (st_id, atten, at_date) VALUES (?, ?, ?)");
                $stmt->bind_param("iss", $st_id, $attn_status, $cur_date);
                $stmt->execute();
            }
        }
        return true;
    }

    // ✅ Fetch Attendance List
    public function attn_student() {
        $sql = "SELECT * FROM at_student";
        return $this->conn->query($sql);
    }

    // ✅ Get Results for a Student by Semester
    public function show_marks($st_id, $semester) {
        $stmt = $this->conn->prepare("SELECT * FROM result WHERE st_id = ? AND semester = ?");
        $stmt->bind_param("is", $st_id, $semester);
        $stmt->execute();
        return $stmt->get_result();
    }

    // ✨ You can add more features like update_result, delete_student, etc.
}
?>
