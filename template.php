<?php
include_once('./config/function.php');
require_once('./config/koneksi.php');
function top(){ settzone();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/icons.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>The Circle</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/now-ui-kit" />
    <link rel="stylesheet" type="text/css" href="admin/js/jquery.select2/select2.css" />
    <link rel="stylesheet" type="text/css" href="admin/js/bootstrap.summernote/dist/summernote.css" />
    <!--  Social tags      -->
    <meta name="keywords" content="bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, now ui, now ui kit, creative tim, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit">
    <meta name="description" content="Start your development with a beautiful Bootstrap 4 UI kit. It is yours Free.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Now UI Kit by Creative Tim">
    <meta itemprop="description" content="Start your development with a beautiful Bootstrap 4 UI kit. It is yours Free.">
    <meta itemprop="image" content="http://s3.amazonaws.com/creativetim_bucket/products/56/original/opt_nuk_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Now UI Kit by Creative Tim">
    <meta name="twitter:description" content="Start your development with a beautiful Bootstrap 4 UI kit. It is yours Free.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="http://s3.amazonaws.com/creativetim_bucket/products/56/original/opt_nuk_thumbnail.jpg">
    <meta name="twitter:data1" content="Now UI Kit by Creative Tim">
    <meta name="twitter:label1" content="Product Type">
    <meta name="twitter:data2" content="Free">
    <meta name="twitter:label2" content="Price">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Now UI Kit by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://demos.creative-tim.com/now-ui-kit/index.html" />
    <meta property="og:image" content="http://s3.amazonaws.com/creativetim_bucket/products/56/original/opt_nuk_thumbnail.jpg" />
    <meta property="og:description" content="Start your development with a beautiful Bootstrap 4 UI kit. It is yours Free." />
    <meta property="og:site_name" content="Creative Tim" />
    <style>
    a#link{
      text-decoration: none;
      color: black;
    }
    a#link:hover{
      color: pink;
    }
    #fixed_button{
      position: fixed;
      bottom: 10px;
      right: 10px;
    }
    #fixed_button1{
      position: fixed;
      bottom: 10px;
      left: 10px;
    }
    #fixed_button3{
      position: fixed;
      bottom: 10px;
      left: 47.5%;
      z-index: 100;
    }
    .but3{
      width: 50px;
      height: 50px;
      background-color: rgb(249,99,50);
      border-radius: 100px;
      color: white;
      text-align: center;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    }
    .but3:hover{
      bottom: 10px;
      background-color: rgba(249,99,50,0.5);
      transition: 1s ease;
    }
    .but{
      width: 50px;
      height: 50px;
      background-color: rgb(231,76,60);
      border-radius: 100px;
      color: white;
      text-align: center;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    }
    .but-content {
      position: fixed;
        bottom: 70px;
        right: 10px;
        border-radius: 5px;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 12px 16px;
        z-index: 1;
        color: black;
        display: none;
    }
    .but:hover .but-content {
      display: block;
      transition: ease 2s;
    }
    .but:hover{
      background-color: rgba(231,76,60,0.5);
      transition: 1s ease;
    }
    .but1{
      width: 50px;
      height: 50px;
      background-color: rgb(241,196,15);
      border-radius: 100px;
      color: white;
      text-align: center;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    }
    .but-content1 {
      position: fixed;
        bottom: 70px;
        left: 10px;
        border-radius: 5px;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 12px 16px;
        z-index: 1;
        color: black;
        display: none;
    }
    .but1:hover .but-content1 {
      display: block;
      transition: ease 10s;
    }
    .but1:hover{
      background-color: rgba(241,196,15,0.5);
      transition: 0.5s ease;
    }
    .image{
      position:relative;
      overflow:hidden;
      padding-bottom:100%;
    }
    .image img{
        position:absolute;
        height:100%;
        overflow: hidden;
    }
    span#a:hover{
      width: 80%;
      background-color: red;
      transition: 1s ease;
    }
    h3{
    margin-bottom:30px;
    margin-top:30px;
}

/* --------- Global ----------*/
.transition{
    transition: all 0.5s ease;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    -ms-transition: all 0.5s ease;
}
.img-responsive{
    width:100%;
}

/* --------- Simple Zoom Effects ----------*/
.product-div1{
    position:relative;
    overflow:hidden;
}
.product-div1:hover img{
    transform: scale(1.1);
}
img{
    transform: scale(1);
}

/* --------- Text View ----------*/
.product-div2{
    position:relative;
    overflow:hidden;
}
.product-div2:hover .text-view{
     top: 50%;
     opacity:1;
}
.product-div2:hover img{
    opacity:.8;
}
.text-view{
    position:absolute;
    top: 60%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    opacity:0;
}
    </style>
</head>

<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="dropdown button-dropdown">
                <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                </a>
            </div>
            <div class="navbar-translate">
                <a class="navbar-brand" href="index.php" rel="tooltip" data-placement="bottom">
                    The Circle
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" data-nav-image="assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="clickme" href="#">Forum</a>
                    </li>
                    <?php
                    if(!isset($_SESSION['login'])){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                  <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?mod=profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
      <!-- pecah -->
    <?php } ?>

        <?php function bot(){ ?>
        <!-- pecah -->
        <!-- <footer class="footer">
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Coded by
                    <a href="https://www.creative-tim.com" target="_blank">The Circle Tim</a>.
                </div>
            </div>
        </footer> -->
    </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="admin/js/jquery.select2/select2.min.js" ></script>
<script type="text/javascript" src="admin/js/bootstrap.summernote/dist/summernote.min.js"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Share Library etc -->
<script src="assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#pilih").change(function () {
     if($("#pilih").val()=='1'){
       $("#loker").show(100);
     } else {
         $("#loker").hide(100);
     }
   });
});
/*Select2*/
$(".select2").select2({
    width: '100%'
});

/*Tags*/
$(".tags").select2({tags: 0,width: '100%'});
$(document).ready(function(){

  $('#summernote').summernote({
      onImageUpload: function(file, editor, editable){
          uploadMedia(file[0], editor, editable);
        }
      });

      // function upload images to media
      function uploadMedia(file, editor, editable){
        data = new FormData();
        data.append("image", file);
        $.ajax({
          url: 'apps/media/media_i.php',
          data: data,
          cache: false,
          contentType: false,
          processData: false,
          type: 'POST',
          success: function(data){
              editor.insertImage(editable, data);
              console.log(data);
            }
          })
        }
      });
</script>
</html>
<?php } ?>
