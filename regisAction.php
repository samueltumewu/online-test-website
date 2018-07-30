<?php
session_start();
require_once "pdo.php";
if ( isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) ) 
{
    //$emailREGEX = '/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i';
    if (preg_match("/@teacher/i", $_POST['email'])) {
        $tipe = 't';
    } else {
        $tipe = 's';
    }

    $var_tipe = $_SESSION['tipe'];
    $sql = "INSERT INTO client (name, last_name, email, username, password, type)
           VALUES (:name, :last_name, :email, :username, password(:password), :type)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':last_name' => $_POST['last_name'],
        ':email' => $_POST['email'],
        ':username' => $_POST['username'],
        ':password' => $_POST['password'],
        ':type' => $tipe
        ));
}

header("Location: index.php");
?>
