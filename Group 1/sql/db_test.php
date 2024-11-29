<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Thông tin kết nối
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'project_db';

// Kết nối
$conn = new mysqli($host, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
} else {
    echo "Kết nối thành công!";
}

// Đóng kết nối
$conn->close();
?>
