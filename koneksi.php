<?php
session_start();
 
//koneksi ke server mysql
$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'webgis'
) or die(mysqli_erro($mysqli));

?>