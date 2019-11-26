<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {
     if(isset($_GET["id"]) && !empty($_GET["id"])){
         require_once('../config/koneksi.php');
         $id=$_GET["id"];
         echo $id;
         $sql = "DELETE FROM notifikasi WHERE notifikasi_id=$id";
         if (mysqli_query($con, $sql) === TRUE) {
              Redir('admin.php?mod=notifikasi&act=t');
         } else {
              echo "Error deleting record: " .$con->error;
         }
     }
}
?>
