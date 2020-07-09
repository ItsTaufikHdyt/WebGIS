<?php 
include "koneksi.php";

$sql = "SELECT * FROM maps";
$result = $conn->query($sql);
$rows = array();
while($data = mysqli_fetch_array($result))
{
    $rows[] = $data;
}
 
echo json_encode($rows, JSON_PRETTY_PRINT);
$db = NULL;
?>