<?php
date_default_timezone_set('Asia/Jakarta');
function ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function blacklist($ip)
{
    require 'script/db.php';
    try {
        require 'script/db.php';
        $dbQuery = $dbConn->prepare("SELECT * FROM `log` WHERE `address`=? ");
        $dbQuery->bind_param("s", $ip);
        $dbQuery->execute();
        $result = $dbQuery->get_result();
        $dbQuery->close();
        if ($result->num_rows === 1) {
            if (checkTime($ip) === 1) {
                session_destroy();
                die(0);
            } else {
                $dbQuery1 = $dbConn->prepare("DELETE FROM `log` WHERE  `address` = ?;");
                $dbQuery1->bind_param("s", $ip);
                $dbQuery1->execute();
                $dbQuery2 = $dbConn->prepare("INSERT into `log`(`address`) VALUES (?);");
                $dbQuery2->bind_param("s", $ip);
                $dbQuery2->execute();
                return false;
            }
        }
        $dbQuery3 = $dbConn->prepare("INSERT into `log`(`address`) VALUES (?);");
        $dbQuery3->bind_param("s", $ip);
        $dbQuery3->execute();
        return true;
    } catch (Exception $e) {
        return false;
    }

}
function checkTime($ip)
{
    try {
        require 'script/db.php';
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
                $status = 1;
            } else {
                $status = 0;
            }
        }
        return $status;
    } catch (Exception $e) {
        return 'Database Error';
    }
}