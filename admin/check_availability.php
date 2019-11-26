<?php
  require_once('../config/koneksi.php');

  if(!empty($_POST["nim"])) {
    $query = $con->prepare("SELECT nim FROM user WHERE nim='" . $_POST["nim"] . "'");
    $query->execute();
    $query->store_result();

    $ttid = $query->num_rows;

  if($ttid>0) {
      echo "<span class='status-not-available'> NIM sudah dipakai.</span>";
  }else{
      echo "<span class='status-available'> NIM bisa digunakan.</span>";
  }
}
if(!empty($_POST["email"])) {
  $query = $con->prepare("SELECT email FROM user WHERE email='" . $_POST["email"] . "'");
  $query->execute();
  $query->store_result();

  $ttem = $query->num_rows;

if($ttem>0) {
    echo "<span class='status-not-available'> Email sudah dipakai.</span>";
}else{
    echo "<span class='status-available'> Email bisa digunakan.</span>";
}
}
?>
