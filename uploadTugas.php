<?php
session_start();
include 'library/config.php';
include 'library/opendb.php';
if(!isset($_SESSION['username'])){
    die("<b>Oops!</b> Access Failed.
        <p>Sistem Logout. Anda harus melakukan Login kembali.</p>
        <button type='button' onclick=location.href='../loginn.php'>Back</button>");
}
    $uploadDir = 'file/';
    if (isset($_POST['upload'])) {
        $fileName = $_FILES['file']['name'];
        $name = explode('.', $fileName);
        $tmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type']; 
        $filePath = $uploadDir.$fileName; 
        $result = move_uploaded_file($tmpName, $filePath);
        $username = $_SESSION['username'];
        $id_penugasan = $_POST['id_penugasan'];
        if (!$result) {
            echo "Error uploading file";
            exit;
        }else{
            $query = "INSERT INTO tugas (name, size, type, path, username, id_penugasan) VALUES('$name[0]', '$fileSize', '$fileType', '$filePath', '$username', '$id_penugasan')" ;
            mysqli_query($conn, $query) or die('Error, query failed');                         
            include 'library/closedb.php';
            header("location:tugasMhs2.php");
        }
    }
?>