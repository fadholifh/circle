<?php
include_once('../../config/function.php');
include_once('../../config/koneksi.php');
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $post_id = $_POST['post_id'];
        $isi = $_POST['isi'];
        $waktu = $_POST['waktu'];
        $penulis = $_POST['penulis'];
        $status = @$_POST['status'];
        if (empty($status)) {
            $status = 1;
        } else {
            $status = 0;
        }

        $sql = "INSERT INTO komentar (post_id, isi, waktu, penulis, status)
        VALUES ('$post_id', '$isi', '$waktu', '$penulis','$status')";

        if ($con->query($sql) === TRUE) {
            Redir("../../index.php?mod=forum&act=det&id=$post_id");
         } else {
            echo "Error: " . $sql . "<br>" . $con->error;
         }
    }
} ?>
