<?php
@session_start();
	$con = @mysqli_connect("localhost", "root", "", "thecircle");
	//cek koneksi error atau tidak
	if (!$con) {
		echo "Error: " . mysqli_connect_error();
		exit();
	}

	//SITE CONFIG
	$SITE_TITLE						= "The Circle";
	$SITE_URL						= "http://localhost/circle/";
	$SITE_ADMIN						= "{$SITE_URL}admin/";
	$SITE_CONTENT					= "{$SITE_URL}d_media/";
	$SITE_SYSTEM					= "{$SITE_URL}config/";

	$DIR_ROOT						= "D:/xampp/htdocs/circle/";
	$DIR_ADMIN						= "{$DIR_ROOT}admin/";
	$DIR_CONTENT					= "{$DIR_ROOT}d_media/";
	$DIR_SYSTEM						= "{$DIR_ROOT}config/";

?>
