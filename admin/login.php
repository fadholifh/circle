<?php
include '../config/koneksi.php';
include '../config/function.php';
session_start();
if (isset($_POST['nim'])){
        // removes backslashes
	$nim = stripslashes($_REQUEST['nim']);
        //escapes special characters in a string
	$nim = mysqli_real_escape_string($con,$nim);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `user` WHERE nim='$nim' AND password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['login'] = $nim;
			$sql    =   "SELECT * FROM user WHERE nim=$nim";
					$query  = mysqli_query($con, $sql);
					$no=0;
					while ($row = mysqli_fetch_array($query))
					{
						if($row['userg_id']==1 && $row['status']==1){
							Redir('admin.php');
						}else {
							Redir('logout.php');
						}
					}
            // Redirect user to index.php
    }else{
      Redir('index.php');
	}
    }
?>
