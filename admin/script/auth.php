<?php
session_start();
$uname = $_POST['uname'];
$pword = $_POST['pword'];
if (check($uname, $pword) === 'true') {
    header("Location:../index.php");
} else {
    header("Location:../");
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
        $session = 'false';
        if ($result->num_rows === 1) {
            $dbGet = $result->fetch_assoc();
            $_SESSION['name'] = $dbGet['name'];
            $session = 'true';
            return $session;
        }
        return $session;
    } catch (Exception $e) {
        return 'Database Error';
    }

}