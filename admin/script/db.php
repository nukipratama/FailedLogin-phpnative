<?php
date_default_timezone_set("Asia/Bangkok");
$dbConn = new mysqli("localhost", "root", "", "db_warehouse");
// $dbConn = new mysqli("127.0.0.1", "nganggu1_nganggur", "(alfamart12)", "nganggu1_warehouse");
// $dbConn = new mysqli("192.168.212.34", "webdev", "webdevpassword", "dbti4002grup10");
if ($dbConn->connect_error) {
    exit('Error connecting to database');
    header('Location:order');
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$dbConn->set_charset("utf8mb4");