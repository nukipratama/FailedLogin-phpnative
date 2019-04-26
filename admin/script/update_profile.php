<?php
session_start();
if (isset($_SESSION['name'])) {
    unset($_SESSION['false']);
} else {
    header("Location:../login.php");
}

function update($name, $pword, $email, $id)
{
    try {
        require 'db.php';
        $dbQuery = $dbConn->prepare("UPDATE `user` SET `name`=?,`pword`=?,`email`=? WHERE `id`=?;");
        $dbQuery->bind_param("sssi", $name, $pword, $email, $id);
        $dbQuery->execute();
        return true;
    } catch (Exception $e) {
        return 'Error Inserting Database';
    }
}
if (isset($_POST)) {

    // echo "Gambar berhasil dikirim" . $gambar;
    $id = $_SESSION['id'];
    $name = $_POST['name'];
    $pword = $_POST['pword'];
    $email = $_POST['email'];
    update($name, $pword, $email, $id);
    $_SESSION['name'] = $name;
    header("Location:../profile.php");

}