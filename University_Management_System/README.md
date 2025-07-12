# 🎓 University Management System (PHP + MySQL)

This is a **University Management System** built using **PHP**, **MySQL**, **HTML**, **CSS**, and **JavaScript**. The system allows administrators, faculty members, and students to manage and view university-related data such as attendance, results, profiles, and more.

---

## 📂 Project Structure

```
University_Management_System/
│
├── index.php                  # Home page (role selection)
├── university_db.sql         # Database import file
│
├── assets/
│   ├── css/                  # Stylesheets
│   ├── images/               # University logo
│   └── js/                   # JavaScript files
│
├── includes/                 # Shared header/footer files
│   ├── headertop_admin.php
│   └── footerbottom.php
│
├── php/
│   ├── config.php            # DB connection
│   └── functions.php         # Core business logic
│
├── modules/
│   ├── attendance/           # Attendance module
│   ├── dashboard/            # Admin dashboard
│   ├── faculty/              # Faculty data
│   ├── login/                # All login/register/logout pages
│   ├── result/               # Result management
│   └── student/              # Student data management
```

---

## ⚙️ Setup Instructions

1. **Install XAMPP**
   - Download and install [XAMPP](https://www.apachefriends.org/index.html)

2. **Import the Database**
   - Open `phpMyAdmin`
   - Create a new database named: `university_db`
   - Import the provided file `university_db.sql`

3. **Run the Project**
   - Copy this folder to `C:\xampp\htdocs\`
   - Open browser and navigate to:  
     `http://localhost/University_Management_System/`

---

## 👤 Login Credentials

### 🔐 Admin
- **Username:** `admin`  
- **Password:** `admin123`

### 👨‍🏫 Faculty
- **Username:** `faculty01`  
- **Password:** `faculty123`

### 🎓 Student
- **Username:** `student01`  
- **Password:** `student123`

> 📝 You can change or add new users directly from the MySQL database or through registration (for students).

---

## ✅ Features

### Admin
- Login & Dashboard
- View/Add/Edit/Delete Students
- View Faculty Details
- Manage Attendance
- View & Update Student Results

### Faculty
- Login & View Profile
- Mark and View Attendance for Students

### Student
- Register/Login
- View Profile
- View Attendance
- View Results

---

## 💡 Notes

- All passwords are stored as **MD5 hashes** (can be enhanced with `password_hash()`).
- Project uses **pure PHP** (no framework).
- Modular folder structure with separation of concerns.
- Responsive layout and user-friendly navigation.

---

## 👨‍💻 Developer

- **Name:** Kunal  
- **Tech Stack:** PHP, MySQL, HTML/CSS, JavaScript

---

## 📬 Feedback or Contributions

Feel free to open issues, suggest improvements, or contribute via pull requests.
