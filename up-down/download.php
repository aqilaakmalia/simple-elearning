<?php
if (isset($_GET['id'])) {
include '../library/config.php';
include '../library/opendb.php';
$id = $_GET['id'];

$query = "SELECT name, type, size FROM users WHERE id ='$id'";
$result = mysqli_query($conn, $query) or die('Error, query failed');
list($name, $type, $size, $content) = mysqli_fetch_array($result);
header("Content-Disposition: attachment; filename=$name");
header("Content-length: $size");
header("Content-type: $type");
include '../library/closedb.php';
exit;
}
?>