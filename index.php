<?php
include_once('template.php');
include_once('config/function.php');
require_once('config/koneksi.php');

$mod = "home";
$mod = @$_GET['mod'];
$act = "_" . @$_GET['act'];
if (empty($_GET['act'])) {
    $act = "_t";
}

$clear = "no";
$clear = @$_GET['clear'];

if (file_exists('./apps/' . $mod . '/' . $mod . $act . '.php')) {
    if (!isset($clear)) {
        top();
        include('./apps/' . $mod . '/' . $mod . $act . '.php');
        include ('notif.php');
        bot();
    } else {
        include('./apps/' . $mod . '/' . $mod . $act . '.php');
    }
} else {
    top();
    include('./apps/home/home.php');
    include ('notif.php');
    bot();
}
?>
