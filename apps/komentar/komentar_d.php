<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {

     if(isset($_GET["id"]) && !empty($_GET["id"])){
         $id=$_GET["id"];
         $p=$_GET['p'];
         $sql = "DELETE FROM komentar WHERE komentar_id=$id";
         if (mysqli_query($con, $sql) === TRUE) {
              Redir("index.php?mod=forum&act=det&id=$p");
         } else {
              echo "Error deleting record: " .$con->error;
         }
     }
}
?>
