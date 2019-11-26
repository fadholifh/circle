<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $judul = $_POST['judul'];
        $isi = htmlspecialchars($_POST['isi'],ENT_QUOTES);
        $waktu = now();
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

              $sql = "INSERT INTO post (judul, isi, waktu, w_deadline, gaji, kota_penempatan, email, no_hp, lowker_id, penulis, forum_id, tag_id, status)
              VALUES ('$judul', '$isi', '$waktu', '$w_deadline', '$gaji', '$kota_penempatan', '$email', '$no_hp', '$lowker_id', '$penulis', '$forum_id', '$tag_id', '$status')";

              if ($con->query($sql) === TRUE) {
                  Redir("index.php?mod=forum&act=t&id=$forum_id");
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
                 move_uploaded_file($file_tmp,"d_media/post/".$files);

                 $sql = "INSERT INTO post (judul, isi, file, waktu, w_deadline, gaji, kota_penempatan, email, no_hp, lowker_id, penulis, forum_id, tag_id status)
                 VALUES ('$judul', '$isi', '$files','$waktu', '$w_deadline', '$gaji', '$kota_penempatan', '$email', '$no_hp', '$lowker_id', '$penulis', '$forum_id', '$tag_id', '$status')";


                 if ($con->query($sql) === TRUE) {
                     Redir("index.php?mod=forum&act=t&id=$forum_id");
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
                 move_uploaded_file($file_tmp,"d_media/post/".$imgs);

                 $sql = "INSERT INTO post (judul, isi, img, waktu, w_deadline, gaji, kota_penempatan, email, no_hp, lowker_id, penulis, forum_id, tag_id, status)
                 VALUES ('$judul', '$isi', '$imgs','$waktu', '$w_deadline', '$gaji', '$kota_penempatan', '$email', '$no_hp', '$lowker_id', '$penulis', '$forum_id', '$tag_id', '$status')";


                 if ($con->query($sql) === TRUE) {
                     Redir("index.php?mod=forum&act=t&id=$forum_id");
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
                 move_uploaded_file($file_tmp,"d_media/post/".$imgs);
                 move_uploaded_file($file_tmp1,"d_media/post/".$files);

                 $sql = "INSERT INTO post (judul, isi, img, file, waktu, w_deadline, gaji, kota_penempatan, email, no_hp, lowker_id, penulis, forum_id, tag_id, status)
                 VALUES ('$judul', '$isi', '$imgs','$files','$waktu', '$w_deadline', '$gaji', '$kota_penempatan', '$email', '$no_hp', '$lowker_id', '$penulis', '$forum_id', '$tag_id', '$status')";


                 if ($con->query($sql) === TRUE) {
                     Redir("index.php?mod=forum&act=t&id=$forum_id");
                  } else {
                     echo "Error: " . $sql . "<br>" . $con->error;
                  }
              }
            }
          } //akhir dari file kosong
        }else{
          if (empty($_FILES['img']['name'])) { //bukan loker img kosong
            $sql = "INSERT INTO post (judul, isi, waktu, penulis, forum_id, tag_id, status)
            VALUES ('$judul', '$isi', '$waktu', '$penulis', '$forum_id', '$tag_id', '$status')";


            if ($con->query($sql) === TRUE) {
                Redir("index.php?mod=forum&act=t&id=$forum_id");
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
               move_uploaded_file($file_tmp,"d_media/post/".$imgs);

               $sql = "INSERT INTO post (judul, isi, waktu, penulis, forum_id, img, tag_id, status)
               VALUES ('$judul', '$isi', '$waktu', '$penulis', '$forum_id', '$imgs', '$tag_id', '$status')";


               if ($con->query($sql) === TRUE) {
                   Redir("index.php?mod=forum&act=t&id=$forum_id");
                } else {
                   echo "Error: " . $sql . "<br>" . $con->error;
                }
            }
          }
        }
    }
} ?>
