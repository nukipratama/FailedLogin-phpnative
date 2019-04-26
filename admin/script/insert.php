<?php
session_start();
if (isset($_SESSION['name'])) {
    unset($_SESSION['false']);
} else {
    header("Location:../login.php");
}
include 'db.php';
function insert($name, $price, $qty, $category, $image)
{
    try {
        require 'db.php';
        $dbQuery = $dbConn->prepare("INSERT into `item`(`name`,`price`,`qty`,`category`,`image`) VALUES (?,?,?,?,?);");
        $dbQuery->bind_param("siiss", $name, $price, $qty, $category, $image);
        $dbQuery->execute();
        return true;
    } catch (Exception $e) {
        return 'Error Inserting Database';
    }

}
if (isset($_POST)) {
    $namafolder = "../../img/inventory/";
    if (!empty($_FILES["image"]["tmp_name"])) {
        $jenis_gambar = $_FILES['image']['type'];

        $gambar = $namafolder . rand() . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $gambar)) {
            // echo "Gambar berhasil dikirim" . $gambar;
            $name = $_POST['name'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $category = $_POST['category'];
            $image = substr($gambar, 3);
            insert($name, $price, $qty, $category, $image);
            header("Location:../");
        } else {
            // echo "Gambar gagal dikirim";
        }

    } else {
        echo "Please input Image.";
    }

} else {
    header("Location:../");
}