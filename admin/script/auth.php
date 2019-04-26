<?php
session_start();
$uname = $_POST['uname'];
$pword = $_POST['pword'];
if (check($uname, $pword)) {
    header("Location:../index.php");
} else {
    if (isset($_SESSION['false'])) {
        $_SESSION['false']++;
    } else {
        $_SESSION['false'] = 1;
    }
    header("Location:../login.php");
}

function check($uname, $pword)
{
    try {
        require 'db.php';
        $dbQuery = $dbConn->prepare("SELECT * FROM user WHERE uname=? AND pword=?");
        $dbQuery->bind_param("ss", $uname, $pword);
        $dbQuery->execute();
        $result = $dbQuery->get_result();

        $dbQuery->close();

        if ($result->num_rows === 1) {
            $dbGet = $result->fetch_assoc();
            $_SESSION['name'] = $dbGet['name'];
            $_SESSION['id'] = $dbGet['id'];
            return true;
        }
        return false;
    } catch (Exception $e) {
        return 'Database Error';
    }

}