<?php
if (insert($_POST['name'], $_POST['uname'], $_POST['pword'], $_POST['email'])) {
    header("Location:../login.php");
}
function insert($name, $uname, $pword, $email)
{
    try {
        require 'db.php';
        $dbQuery = $dbConn->prepare("INSERT into `user`(`uname`,`pword`,`name`,`email`) VALUES (?,?,?,?);");
        $dbQuery->bind_param("ssss", $uname, $pword, $name, $email);
        $dbQuery->execute();
        return true;
    } catch (Exception $e) {
        return 'Error Inserting Database';
    }

}