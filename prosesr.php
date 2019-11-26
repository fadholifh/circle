<?php
include_once('config/function.php');
require_once('config/koneksi.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $nim = $_POST['nim'];
  $password = md5($_POST['password']);
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $alamat = "-";
  $tempat = $_POST['tempat'];
  $ttl = $_POST['ttl'];
  $phone = $_POST['phone'];
  $work = "-";
  $level = $_POST['level'];
  $avatar = "default/no-ava.png";
  $dr = now();
  $bio = "-";
  if (empty($status)) {
      $status = 1;
  } else {
      $status = 0;
  }

  $query = $con->prepare("SELECT nim FROM user WHERE nim='" . $_POST["nim"] . "'");
  $query->execute();
  $query->store_result();

  $ttid = $query->num_rows;

  if($ttid>= 1) {
    echo "nim sudah dipakai";
    Redir('register.php?p=ern');
    exit;
  }

  $query1 = $con->prepare("SELECT email FROM user WHERE email='" . $_POST["email"] . "'");
  $query1->execute();
  $query1->store_result();

  $ttem = $query1->num_rows;

  if($ttem>= 1) {
    echo "nim sudah dipakai";
    Redir('register.php?p=ere');
    exit;
  }

  $sql = "INSERT INTO user (nim, nama, password, email, alamat, tempat_lahir, ttl, no_hp, work, bio, registered, userg_id, status)
  VALUES ('$nim','$nama','$password','$email','$alamat','$tempat','$ttl','$phone','$work','$bio','$dr','$level','$status')";

  if ($con->query($sql) === TRUE) {
      Redir('register.php?s=suc');
  } else {
      echo "Error: " . $sql . "<br>" . $con->error;
  }
}

?>
