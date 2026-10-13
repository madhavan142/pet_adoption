PET ADOPTION MANAGEMENT SYSTEM
================================

Technology:
PHP, MySQL, HTML, CSS, JavaScript-ready structure
Server: XAMPP

INSTALLATION
1. Install XAMPP.
2. Start Apache and MySQL.
3. Copy the folder Pet_Adoption_Management_System into C:\xampp\htdocs\
4. Open http://localhost/phpmyadmin
5. Import database/database.sql. It creates the pet_adoption database and sample data.
6. Open:
   http://localhost/Pet_Adoption_Management_System/

ADMIN LOGIN
Username: admin
Password: admin123
Admin URL:
http://localhost/Pet_Adoption_Management_System/admin/login.php

DEMO FLOW
Home -> Available Pets -> View Details -> Adopt -> Submit Application
Then:
Admin Login -> Adoption Applications -> Approve/Reject

If MySQL uses a password, edit config.php:
mysqli_connect("localhost", "root", "YOUR_PASSWORD", "pet_adoption");

PROJECT MODULES
1. Home page
2. Pet listing and search
3. Pet details
4. Adoption application
5. Admin login
6. Admin dashboard
7. Pet management
8. Adoption application management
9. MySQL database
