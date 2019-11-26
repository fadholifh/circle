<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {
  $f = $_GET['f'];
   if(isset($_GET["id"]) && !empty($_GET["id"])){
       require_once('config/koneksi.php');
       $id=$_GET["id"];
       $sql = "DELETE FROM post WHERE post_id=$id";
       if (mysqli_query($con, $sql) === TRUE) {
            Redir("index.php?mod=forum&act=t&id=$f");
       } else {
            echo "Error deleting record: " .$con->error;
       }
   }
 }
 ?>
