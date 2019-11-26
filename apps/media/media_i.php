<?php
session_start();
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {

    require_once('../../config/koneksi.php');
    require_once('../../config/function.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $date = now();
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $tmp = explode('.', $file_name);
      $file_ext=strtolower(end($tmp));

      $images = 'media-' . $file_name;

      $expensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size <= 0 || $file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../../d_media/media/".$images);
         $sql = "INSERT INTO media (name, type, size, date) VALUES ('$images', '$file_type', '$file_size', '$date')";
         echo "$SITE_URL"."d_media/media/$images";
      }else{
         print_r($errors);
      }
    }
}
?>
