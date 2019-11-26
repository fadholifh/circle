<?php
session_start();
echo $_SESSION['login'];
include_once('config/koneksi.php');
if (!isset($_SESSION['login'])) {
     header('location: index.php');
} else {
    session_destroy();
    unset($_SESSION['login']);
    header('location:index.php?act=logout');
}
?>
