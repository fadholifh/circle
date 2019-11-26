<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = $_SESSION['login'];
        $nim = $_POST['nim'];
        $password = md5($_POST['newpassword']);
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $tempat = $_POST['tempat'];
        $ttl = $_POST['ttl'];
        $phone = $_POST['phone'];
        $work = $_POST['work'];
        $level = $_POST['level'];
        $status1 = $_POST['status'];
        $avatar = "default/no-ava.png";
        $dr = now();
        $bio = htmlspecialchars($_POST['bio'],ENT_QUOTES);
        if (!empty($status1)) {
            $status = 1;
        } else {
            $status = 0;
        }


        //jika mendapat form file kosong
if (empty($_FILES['img']['name'])) {

    //jika password baru kosong
    if(empty($_POST['newpassword'])) {
      $sql = "UPDATE user SET
      nim='$nim',
      nama='$nama',
      email='$email',
      alamat='$alamat',
      tempat_lahir='$tempat',
      ttl='$ttl',
      no_hp='$phone',
      work='$work',
      bio='$bio',
      userg_id='$level',
      status='$status'
      WHERE nim='$id'";

      if ($con->query($sql) === TRUE) {
          Redir('admin.php?mod=user&act=t');
      } else {
          echo "Error: " . $sql . "<br>" . $con->error;
      }

        //jika password isi
    } else {

      $password = md5($_POST['newpassword']);
      $sql = "UPDATE user SET
      nim='$nim',
      nama='$nama',
      email='$email',
      password='$password',
      alamat='$alamat',
      tempat_lahir='$tempat',
      ttl='$ttl',
      no_hp='$phone',
      work='$work',
      bio='$bio',
      userg_id='$level',
      status='$status'
      WHERE nim='$id'";

      if ($con->query($sql) === TRUE) {
          Redir('admin.php?mod=user&act=t');
      } else {
          echo "Error: " . $sql . "<br>" . $con->error;
      }
    }
} else {
  if (empty($_POST['newpassword'])) {
    //avatar update
          $errors= array();
          $file_name = $_FILES['img']['name'];
          $file_size = $_FILES['img']['size'];
          $file_tmp = $_FILES['img']['tmp_name'];
          $file_type = $_FILES['img']['type'];
          $tmp = explode('.', $file_name);
          $file_ext=strtolower(end($tmp));

          $imgs = 'user-' . $file_name;

          $expensions= array("jpeg","jpg","png");

          if(in_array($file_ext,$expensions)=== false){
             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
          }

          if($file_size <= 0 || $file_size > 2097152) {
             $errors[]='File size must be excately 2 MB';
          }

          if(empty($errors)==true) {
             move_uploaded_file($file_tmp,"../d_media/avatar/".$imgs);
             $sql = "UPDATE user SET
             nim='$nim',
             nama='$nama',
             email='$email',
             img='$imgs',
             alamat='$alamat',
             tempat_lahir='$tempat',
             ttl='$ttl',
             no_hp='$phone',
             work='$work',
             bio='$bio',
             userg_id='$level',
             status='$status'
             WHERE nim='$id'";

             if ($con->query($sql) === TRUE) {
                 Redir('admin.php?mod=user&act=t');
             } else {
                 echo "Error: " . $sql . "<br>" . $con->error;
             }
          }else{
             print_r($errors);
          }

            //jika password diisi
        } else {
            // get previous ava

            $errors= array();
            $file_name = $_FILES['img']['name'];
            $file_size = $_FILES['img']['size'];
            $file_tmp = $_FILES['img']['tmp_name'];
            $file_type = $_FILES['img']['type'];
            $tmp = explode('.', $file_name);
            $file_ext=strtolower(end($tmp));

            $imgs = 'user-' . $file_name;

            $expensions= array("jpeg","jpg","png");


            if(in_array($file_ext,$expensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.".$file_ext;
            }

            if($file_size <= 0 || $file_size > 2097152) {
               $errors[]='File size must be excately 2 MB';
            }

            if(empty($errors)==true) {
               move_uploaded_file($file_tmp,"../d_media/avatar/".$imgs);
               $password = md5($_POST['newpassword']);
               $sql = "UPDATE user SET
               nim='$nim',
               nama='$nama',
               email='$email',
               password='$password',
               img='$imgs',
               alamat='$alamat',
               tempat_lahir='$tempat',
               ttl='$ttl',
               no_hp='$phone',
               work='$work',
               bio='$bio',
               userg_id='$level',
               status='$status'
               WHERE nim='$id'";

               if ($con->query($sql) === TRUE) {
                   Redir('admin.php?mod=user&act=t');
               } else {
                   echo "Error: " . $sql . "<br>" . $con->error;
               }
            }else{
               print_r($errors);
            }
        }
    }
}
        ?>
        <script>
        function checkAvailabilityNIM() {
        	$("#loaderIcon").show();
        	jQuery.ajax({
        	url: "check_availability.php",
        	data:'nim='+$("#nim").val(),
        	type: "POST",
        	success:function(data){
        		$("#user-availability-status").html(data);
        		$("#loaderIcon").hide();
        	},
        	error:function (){}
        	});
        }
        function checkAvailabilityEmail() {
        	$("#loaderIcon").show();
        	jQuery.ajax({
        	url: "check_availability.php",
        	data:'email='+$("#email").val(),
        	type: "POST",
        	success:function(data){
        		$("#email-availability-status").html(data);
        		$("#loaderIcon").hide();
        	},
        	error:function (){}
        	});
        }
        </script>
        <div class="cl-mcont">
            <div class="page-head">
                <ol class="breadcrumb">
                    <li><a href="#">Digilib</a></li>
                    <li><a href="?mod=user&amp;act=t">User</a></li>
                    <li class="active">Tambah User</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="header">
                    <h3><i class="fa fa-user nav-icon"></i> Tambah User</h3>
                </div>
                <div class="content">
                    <form class="form-horizontal group-border-dashed" style="border-radius: 0px;" enctype="multipart/form-data" role="form" method="post" action="">
        <?php
        if (isset($msg_error)) {
            ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-times-circle  sign"></i><strong>Error!</strong> Tidak Boleh Kosong!
                            </div>
        <?php }

        $id=$_SESSION['login'];
        $sql    =   "SELECT * FROM user WHERE nim=$id";
            $query  = mysqli_query($con, $sql);
            $no=0;
            while ($row = mysqli_fetch_array($query))
            {
        ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">NIM</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id'] ?>" >
                                <input type="text" class="form-control" name="nim" id="nim" onBlur="checkAvailabilityNIM()" required placeholder="Ex.15111234" value="<?php echo $row['nim'] ?>" >
                                <span id="user-availability-status"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">E-Mail</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="email" id="email" onBlur="checkAvailabilityEmail()" required value="<?php echo $row['email'] ?>">
                                <span id="email-availability-status"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="newpassword" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gambar</label>
                            <div class="col-sm-1">
                                <img src="../d_media/avatar/<?php echo $row['img'] ?>" width="40px;"/>
                            </div>
                            <div class="col-sm-3">
                                <input type="file" class="form-control" name="img">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Lengkap</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="alamat"><?php echo $row['alamat'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tempat Lahir</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="tempat" value="<?php echo $row['tempat_lahir'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal Lahir</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" name="ttl" value="<?php echo $row['ttl'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">No HP</label>
                            <div class="col-sm-6">
                                <input type="text" name="phone" class="form-control" value="<?php echo $row['no_hp'] ?>"/>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kerja</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="work" value="<?php echo $row['work'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Bio</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="bio" value="<?php echo $row['bio'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Level</label>
                            <div class="col-sm-3">
                                <select class="select2" name="level">
        <?php
        $sql    =   'SELECT * FROM userg WHERE status=1';
        $query  = mysqli_query($con, $sql);
        $no=0;
        while ($rows= mysqli_fetch_array($query))
        {
            ?>
                                        <option value="<?php echo $rows['userg_id']; ?>" <?php if ($row['userg_id'] == $rows['userg_id']) {
                echo ' selected=selected';
            } ?>><?php echo $rows['nama']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div><h5><a href="admin.php?mod=user_group&act=i" target="_blank"><i class="fa fa-plus"></i> Level</a></h5>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-6">
                                <input class="switch" type="checkbox" data-on-color="success" data-size="small" name="status" <?php if ($row['status'] == 1) { echo 'checked="checked"';} ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <button id="sub" class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                      </div>
                </div>
                </form>
            </div>
        </div>
    <?php }
} ?>
