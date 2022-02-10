<?php
session_start();
include '../library/config.php';
include '../library/opendb.php';
if(!isset($_SESSION['username'])){
    die("<b>Oops!</b> Access Failed.
        <p>Sistem Logout. Anda harus melakukan Login kembali.</p>
        <button type='button' onclick=location.href='../loginn.php'>Back</button>");
}
    $uploadDir = '../file/';
    if (isset($_POST['upload'])) {
        $fileName = $_FILES['file']['name'];
        $name = explode('.', $fileName);
        $tmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type']; 
        $filePath = $uploadDir.$fileName; 
        $result = move_uploaded_file($tmpName, $filePath);
        $username = $_SESSION['username'];
        $id_matkul = $_POST['id_matkul'];
        if (!$result) {
            echo "Error uploading file";
            exit;
        }else{
            $query = "INSERT INTO upload (name, size, type, path, username, id_matkul) VALUES('$name[0]', '$fileSize', '$fileType', '$filePath', '$username','$id_matkul')";
            mysqli_query($conn, $query) or die('Error, query failed');                         
            include '../library/closedb.php';
            header("location:index.php");
        }
    }
?>