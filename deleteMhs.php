<?php
session_start();
$errorMessage = '';
if (isset($_GET['id'])) {
    include 'library/config.php';
    include 'library/opendb.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header ("location : dataMhs.php");
    } else {
        echo "Gagal, Error : " . mysqli_error($conn);
    } include 'library/closedb.php';
}
?>
