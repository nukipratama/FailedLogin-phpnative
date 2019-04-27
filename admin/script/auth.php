<?php
session_start();
$uname = $_POST['uname'];
$pword = $_POST['pword'];
checkTime(ip());
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
function checkTime($ip)
{
    try {
        require 'db.php';
        $dbQuery = $dbConn->prepare("SELECT * FROM `log` WHERE `address`=? ");
        $dbQuery->bind_param("s", $ip);
        $dbQuery->execute();
        $result = $dbQuery->get_result();
        $dbQuery->close();
        $status = 0;
        if ($result->num_rows === 1) {
            $dbGet = $result->fetch_assoc();
            $book_time = date('d-m-Y H:i:s', strtotime($dbGet['time'] . '+ 15 minutes'));
            $current_time = date('d-m-Y H:i:s');
            $book_time = strtotime($book_time);
            $current_time = strtotime($current_time);
            if ($book_time > $current_time) {
		session_destroy();
                die(0);
            } else {

 	
            }
        }
        return 'Blocked';
    } catch (Exception $e) {
        return 'Database Error';
    }
}
function ip()
{
    
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}
