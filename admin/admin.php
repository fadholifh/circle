<?php

// session_start();
// if (empty($_SESSION['login'])) {
//     $ref = urlencode("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
//     $_SESSION['ref'] = $ref;
//     //header('location:'.$SITE_ADMIN.'index.php');
// } else {
    include_once('template.php');
    include_once('../config/function.php');
    require_once('../config/koneksi.php');

    $mod = "awal";
    $mod = @$_GET['mod'];
    $act = "_" . @$_GET['act'];
    if (empty($_GET['act'])) {
        $act = "_t";
    }

    $clear = "no";
    $clear = @$_GET['clear'];

    if (file_exists('./apps/' . $mod . '/' . $mod . $act . '.php')) {
        if (!isset($clear)) {
            ptop();
            include('./apps/' . $mod . '/' . $mod . $act . '.php');
            pbottom();
        } else {
            include('./apps/' . $mod . '/' . $mod . $act . '.php');
        }
    } else {
        ptop();
        include('./apps/awal/awal.php');
        pbottom();
    }
// }
?>
