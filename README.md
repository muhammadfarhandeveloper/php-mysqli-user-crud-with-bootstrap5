# PHP MySQLi CRUD with Bootstrap 5.3

A simple **CRUD (Create, Read, Update, Delete) application** built using **PHP (MySQLi)** and **Bootstrap 5.3**.  
This application allows users to **manage user records**, including **search functionality**.

---

## 🌟 Features
✅ Add New Users  
✅ Edit Existing Users  
✅ Delete Users  
✅ Display Users in a Table  
✅ Search Users (by Name, Email, Role)  
✅ Bootstrap 5.3 for Responsive UI  
✅ Secure Password Storage (MD5 Hash)  
✅ MySQLi Database Connection  

---

## 📂 Folder Structure
/php-mysqli-user-crud-with-bootstrap5 │── db.php │── index.php │── create.php │── update.php │── delete.php │── config.php │── styles.css └── README.md


---

## 🔧 Installation

### **1️⃣ Clone the Repository**
```sh
git clone https://github.com/muhammadfarhandeveloper/php-mysqli-user-crud-with-bootstrap5.git
cd php-mysqli-user-crud-with-bootstrap5

2️⃣ Configure the Database
Create a new MySQL database (e.g., users_crud).
Import the provided users.sql file into your database.

3️⃣ Database Schema (users Table)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
    status TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


4️⃣ Database Connection (db.php)

<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "users_crud";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>


5️⃣ Run the Project
Start a local server using XAMPP, WAMP, or MAMP.
Open your browser and go to
http://localhost/php-mysqli-user-crud-with-bootstrap5/index.php


🚀 Usage

🔍 Search Users
Use the search bar to find users by name, email, or role.
➕ Add a New User (create.php)
Click the "Add New User" button and fill in the form.
The password is stored using MD5 encryption.
✏️ Edit a User (update.php)
Click "Edit" next to a user.
Modify the details and save.
🗑️ Delete a User (delete.php)
Click "Delete", and confirm the action.
🎨 UI Preview

🛠️ Built With
PHP (Procedural with MySQLi)
MySQL Database
Bootstrap 5.3
HTML / CSS
🛡️ Security Notes
Used htmlspecialchars() to prevent XSS attacks.
Used password hashing (MD5) for storing passwords.
🤝 Contributing
Feel free to fork this repository and submit pull requests for improvements.

📜 License
This project is open-source and available under the MIT License.

📞 Contact
For any issues or feature requests, reach out at:
📧 mohammadfarhan44500@gmail.com
👨‍💻 GitHub: muhammadfarhandeveloper
