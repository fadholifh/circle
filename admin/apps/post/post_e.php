<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $judul = $_POST['judul'];
        $isi = htmlspecialchars($_POST['isi'],ENT_QUOTES);
        $waktu = now();
        $id = $_POST['id'];
        $w_deadline = $_POST['w_deadline'];
        $gaji = $_POST['gaji'];
        $kota_penempatan = $_POST['kota_penempatan'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $lowker_id = $_POST['lowker_id'];
        $penulis = $_SESSION['login'];
        $forum_id = $_POST['forum_id'];
        $status = @$_POST['status'];
        if (!empty($status)) {
            $status = 1;
        } else {
            $status = 0;
        }

        if (!empty($_POST['tag_id'])) {
            $tag_seo = $_POST['tag_id'];
            $tag_id = implode(',', $tag_seo);
        } else {
            $tag_id = '';
        }


        if ($_POST['forum_id'] == 1) { //forum = loker

          if (empty($_FILES['img']['name'])) { //image post kosong
            if (empty($_FILES['file']['name'])) { //img kosong logo kosong

              $sql = "UPDATE post SET
              judul = '$judul',
              isi = '$isi',
              w_deadline = '$w_deadline',
              gaji = '$gaji',
              kota_penempatan = '$kota_penempatan',
              email = '$email',
              no_hp = '$no_hp',
              lowker_id = '$lowker_id',
              forum_id = '$forum_id',
              tag_id = '$tag_id',
              status= '$status'
              WHERE post_id='$id'";

              if ($con->query($sql) === TRUE) {
                  Redir('admin.php?mod=post&act=t');
               } else {
                  echo "Error: " . $sql . "<br>" . $con->error;
               }
            }else { //img kosong logo isi
              $errors= array();
              $file_name = $_FILES['file']['name'];
              $file_size = $_FILES['file']['size'];
              $file_tmp = $_FILES['file']['tmp_name'];
              $file_type = $_FILES['file']['type'];
              $tmp = explode('.', $file_name);
              $file_ext=strtolower(end($tmp));

              $files = 'logo-' . $file_name;

              $expensions= array("jpeg","jpg","png");

              if(in_array($file_ext,$expensions)=== false){
                 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
              }

              if($file_size <= 0 || $file_size > 2097152) {
                 $errors[]='File size must be excately 2 MB';
              }

              if(empty($errors)==true) {
                 move_uploaded_file($file_tmp,"../d_media/post/".$files);

                 $sql = "UPDATE post SET
                 judul = '$judul',
                 isi = '$isi',
                 file = '$files',
                 w_deadline = '$w_deadline',
                 gaji = '$gaji',
                 kota_penempatan = '$kota_penempatan',
                 email = '$email',
                 no_hp = '$no_hp',
                 lowker_id = '$lowker_id',
                 forum_id = '$forum_id',
                 tag_id = '$tag_id',
                 status= '$status'
                 WHERE post_id='$id'";


                 if ($con->query($sql) === TRUE) {
                     Redir('admin.php?mod=post&act=t');
                  } else {
                     echo "Error: " . $sql . "<br>" . $con->error;
                  }
              }

            }

          }else{ //image isi
            if (empty($_FILES['file']['name'])) { //img isi logo kosong
              $errors= array();
              $file_name = $_FILES['img']['name'];
              $file_size = $_FILES['img']['size'];
              $file_tmp = $_FILES['img']['tmp_name'];
              $file_type = $_FILES['img']['type'];
              $tmp = explode('.', $file_name);
              $file_ext=strtolower(end($tmp));

              $imgs = 'post-' . $file_name;

              $expensions= array("jpeg","jpg","png");

              if(in_array($file_ext,$expensions)=== false){
                 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
              }

              if($file_size <= 0 || $file_size > 2097152) {
                 $errors[]='File size must be excately 2 MB';
              }

              if(empty($errors)==true) {
                 move_uploaded_file($file_tmp,"../d_media/post/".$imgs);

                 $sql = "UPDATE post SET
                 judul = '$judul',
                 isi = '$isi',
                 img = '$imgs',
                 w_deadline = '$w_deadline',
                 gaji = '$gaji',
                 kota_penempatan = '$kota_penempatan',
                 email = '$email',
                 no_hp = '$no_hp',
                 lowker_id = '$lowker_id',
                 forum_id = '$forum_id',
                 tag_id = '$tag_id',
                 status= '$status'
                 WHERE post_id='$id'";


                 if ($con->query($sql) === TRUE) {
                     Redir('admin.php?mod=post&act=t');
                  } else {
                     echo "Error: " . $sql . "<br>" . $con->error;
                  }
              }

            }else { //img isi logo isi
              //Logo
              $errors= array();
              $file_name1 = $_FILES['file']['name'];
              $file_size1 = $_FILES['file']['size'];
              $file_tmp1 = $_FILES['file']['tmp_name'];
              $file_type1 = $_FILES['file']['type'];
              $tmp1 = explode('.', $file_name1);
              $file_ext1=strtolower(end($tmp1));

              $files = 'logo-' . $file_name1;

              $expensions1= array("jpeg","jpg","png");

              if(in_array($file_ext1,$expensions1)=== false){
                 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
              }

              if($file_size1 <= 0 || $file_size1 > 2097152) {
                 $errors[]='File size must be excately 2 MB';
              }

              //img post
              $file_name = $_FILES['img']['name'];
              $file_size = $_FILES['img']['size'];
              $file_tmp = $_FILES['img']['tmp_name'];
              $file_type = $_FILES['img']['type'];
              $tmp = explode('.', $file_name);
              $file_ext=strtolower(end($tmp));

              $imgs = 'post-' . $file_name;

              $expensions= array("jpeg","jpg","png");

              if(in_array($file_ext,$expensions)=== false){
                 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
              }

              if($file_size <= 0 || $file_size > 2097152) {
                 $errors[]='File size must be excately 2 MB';
              }

              if(empty($errors)==true) {
                 move_uploaded_file($file_tmp,"../d_media/post/".$imgs);
                 move_uploaded_file($file_tmp1,"../d_media/post/".$files);

                 $sql = "UPDATE post SET
                 judul = '$judul',
                 isi = '$isi',
                 img = '$imgs',
                 file = '$files',
                 w_deadline = '$w_deadline',
                 gaji = '$gaji',
                 kota_penempatan = '$kota_penempatan',
                 email = '$email',
                 no_hp = '$no_hp',
                 lowker_id = '$lowker_id',
                 forum_id = '$forum_id',
                 tag_id = '$tag_id',
                 status= '$status'
                 WHERE post_id='$id'";


                 if ($con->query($sql) === TRUE) {
                     Redir('admin.php?mod=post&act=t');
                  } else {
                     echo "Error: " . $sql . "<br>" . $con->error;
                  }
              }
            }
          } //akhir dari file kosong
        }else{
          if (empty($_FILES['img']['name'])) { //bukan loker img kosong
            $sql = "UPDATE post SET
            judul = '$judul',
            isi = '$isi',
            forum_id = '$forum_id',
            tag_id = '$tag_id',
            status= '$status'
            WHERE post_id='$id'";


            if ($con->query($sql) === TRUE) {
                Redir('admin.php?mod=post&act=t');
             } else {
                echo "Error: " . $sql . "<br>" . $con->error;
             }
          }else {
            $errors= array();
            $file_name = $_FILES['img']['name'];
            $file_size = $_FILES['img']['size'];
            $file_tmp = $_FILES['img']['tmp_name'];
            $file_type = $_FILES['img']['type'];
            $tmp = explode('.', $file_name);
            $file_ext=strtolower(end($tmp));

            $imgs = 'post-' . $file_name;

            $expensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$expensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if($file_size <= 0 || $file_size > 2097152) {
               $errors[]='File size must be excately 2 MB';
            }

            if(empty($errors)==true) {
               move_uploaded_file($file_tmp,"../d_media/post/".$imgs);

               $sql = "UPDATE post SET
               judul = '$judul',
               isi = '$isi',
               img = '$imgs',
               forum_id = '$forum_id',
               tag_id = '$tag_id',
               status= '$status'
               WHERE post_id='$id'";


               if ($con->query($sql) === TRUE) {
                   Redir('admin.php?mod=post&act=t');
                } else {
                   echo "Error: " . $sql . "<br>" . $con->error;
                }
            }
          }
        }
    }


    if (1 == 0) {
        er('');
        echo '';
    } else {
        ?>
        <div class="cl-mcont">
            <div class="page-head">
                <ol class="breadcrumb">
                    <li><a href="#">Digilib</a></li>
                    <li><a href="?mod=post&amp;act=t">post</a></li>
                    <li class="active">Tambah post</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="header">
                    <h3><i class="fa fa-pencil-square-o nav-icon"></i> Edit post</h3>
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
        $id=$_GET["id"];
        $sql    =   "SELECT * FROM post WHERE post_id=$id";
            $query  = mysqli_query($con, $sql);
            $no=0;
            while ($rop = mysqli_fetch_array($query))
            {
        ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Forum</label>
                            <div class="col-sm-6">
                                <select class="select2" name="forum_id" id="pilih">
                                    <?php

                                        $sql1    =   'SELECT * FROM forum WHERE status=1';
                                        $query1  = mysqli_query($con, $sql1);
                                        $no=0;
                                        while ($row1 = mysqli_fetch_array($query1))
                                        {
                                            ?>
                                    <option value="<?php echo $row1['forum_id']; ?>" <?php if ($row1['forum_id'] == $rop['forum_id']) {
            echo ' selected=selected';
        } ?>><?php echo $row1['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Judul</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id']; ?>" required>
                                <input type="text" class="form-control" name="judul" value="<?php echo $rop['judul'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Isi</label>
                            <div class="col-sm-6">
                                <textarea id="summernote" class="form-control" name="isi"><?php echo $rop['isi'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Cover Post</label>
                            <div class="col-sm-3">
                                <img width="50px" src="../d_media/post/<?php echo $rop['img'] ?>" />
                                <input type="file" class="form-control" name="img">
                            </div>
                        </div>
                        <div id="loker">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Logo Perusahaan</label>
                            <div class="col-sm-3">
                                <img width="50px" src="../d_media/post/<?php echo $rop['file'] ?>" />
                                <input type="file" class="form-control" name="file">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Waktu Deadline</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control datetime" name="w_deadline" value="<?php echo $rop['w_deadline'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gaji</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="gaji" value="<?php echo $rop['gaji'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kota Penempatan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="kota_penempatan" value="<?php echo $rop['kota_penempatan'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="email" value="<?php echo $rop['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">No Telp</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="no_hp" value="<?php echo $rop['no_hp'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tipe Lowker</label>
                            <div class="col-sm-6">
                                <select class="select2" name="lowker_id">
                                    <?php
                                        $sql    =   "SELECT * FROM lowker WHERE status=1";
                                        $query  = mysqli_query($con, $sql);
                                        $no=0;
                                        while ($row = mysqli_fetch_array($query))
                                        {
                                            ?>
                                    <option  value="<?php echo $row['lowker_id']; ?>" <?php if ($row['lowker_id'] == $rop['lowker_id']) {
            echo ' selected=selected';
        } ?>><?php echo $row['tipe']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tag</label>
                            <div class="col-sm-6"><span><i>Tag yang dipilih</span>
                              <?php $a = $rop['tag_id'];
                              $arr = explode(",",$a);
                              foreach ($arr as $tag) {
                                $q = "SELECT * FROM tag WHERE tag_id='$tag'";
                                $query = mysqli_query($con, $q);
                                $b = mysqli_fetch_array($query);

                                  echo $b['nama'].",";
                              } ?></i>
                                <select class="select2" multiple name="tag_id[]" required>
                                    <?php
                                    $sql    =   "SELECT * FROM tag WHERE status=1";
                                    $query  = mysqli_query($con, $sql);
                                    $no=0;
                                    while ($row = mysqli_fetch_array($query))
                                    {
                                    ?>
                                    <option  value="<?php echo $row['tag_id'];?>" required><?php echo $row['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-6">
                                <input class="switch" type="checkbox" data-on-color="success" data-size="small" name="status" <?php if ($rop['status'] == 1) { echo 'checked="checked"';} ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    <?php }
  }?>
<?php } ?>
