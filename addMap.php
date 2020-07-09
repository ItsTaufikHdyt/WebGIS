<?php

include('koneksi.php');

if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];
  // $query = "INSERT INTO maps(nama,latitude,longitude) VALUES ('$nama', '$latitude', '$longitude')";
  $query = "INSERT INTO maps(nama,latitude,longitude) VALUES ('$nama','$latitude','$longitude')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}else{
 	 echo 'GAGAL';
 }

//  if(isset($_POST['submit'])) {
// // menangkap data yang di kirim dari form
// $nama = $_POST['nama'];
// $latitude = $_POST['lat'];
// $longitude = $_POST['lng'];

// $query = "INSERT INTO maps(id,nama,latitude,longitude) VALUES ('8','Pasar Rawa Indah','0.12737263678546318','117.48281478881837')";	// menginput data ke database
// $result = mysqli_query($koneksi,$query);
 
// // Show message when user added
//         echo "User added successfully. <a href='index.php'>View Users</a>";
//  } else{
//  	 echo 'GAGAL';
//  }

 
?>