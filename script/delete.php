<?php
session_start();
if (isset($_SESSION['name'])) {
    unset($_SESSION['false']);
} else {
    header("Location:../login.php");
}
include 'db.php';
function delete($id)
{
    try {
        require 'db.php';
        $dbQuery = $dbConn->prepare("DELETE FROM `item` WHERE `id`=?;");
        $dbQuery->bind_param("i", $id);
        $dbQuery->execute();
        return true;
    } catch (Exception $e) {
        return 'Error Inserting Database';
    }

}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    delete($id);
    header("Location:../");
} else {
    header("Location:../");
}