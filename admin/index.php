<?php
include('../config/koneksi.php');
include_once('../config/function.php');

//check if already login
if (isset($_SESSION['login'])) {
    header('location:' . $SITE_ADMIN . 'admin.php');
}
    ?>
    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="shortcut icon" href="images/icons.png">

            <title>Login</title>
            <link href='../../fonts.googleapis.com/csse05c.css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
            <link href='../../fonts.googleapis.com/css8b0d.css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

            <!-- Bootstrap core CSS -->
            <link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

            <link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">

            <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
              <script src="../../assets/js/html5shiv.js"></script>
              <script src="../../assets/js/respond.min.js"></script>
    	<![endif]-->

            <!-- Custom styles for this template -->
            <link href="css/style.css" rel="stylesheet" />

        </head>

        <body class="texture">

            <div id="cl-wrapper" class="login-container">
                <div class="middle-login">
                    <div class="block-flat">
                        <div class="header">
                            <h3 class="text-center"><img class="logo-img" src="images/logo.png" alt="logo"/></h3>
                        </div>
                        <div>
						<div id="login">
                            <form style="margin-bottom: 0px !important;" class="form-horizontal" name="login" action="login.php" method="post">
                                <div class="content">
								<!-- <//?php
									//if(isset($_GET['emailsent'])){ ?>
										Email Sent!
									<!-- <//?php } ?> -->

                                    <h4 class="title text-center">Menu Masuk</h4>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input name="nim" type="text" placeholder="ex 1511xxxx" id="username" class="form-control" required="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                <input name="password" type="password" placeholder="Password" id="password" class="form-control" required="" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="foot">
                                    <a class="btn btn-default" href="#" id="forgot">Lupa?</a>
                                    <button class="btn btn-primary" data-dismiss="modal" type="submit">Masuk</button>
                                </div>
                            </form>
							</div>
							<div id="lupa" style="display:none">
							<form style="margin-bottom: 0px !important;" class="form-horizontal" name="forgot" action="forgot.php" method="post">
                                <div class="content">
                                    <h4 class="title text-center">Lupa Password</h4>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <input name="d_email" type="email" placeholder="Masukan Email" id="email" class="form-control" required=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="foot">
									<a class="btn btn-default" href="#" id="kembali">Kembali</a>
									<button class="btn btn-primary" type="submit">Kirim</button>
                                </div>
                            </form>
							</div>
                        </div>
                    </div>
                    <div class="text-center out-links"><a href="../index.html">&copy; 2017 The Circle</a></div>
                </div>

            </div>

            <script src="js/jquery.js"></script>
            <script type="text/javascript">
                $(function(){
                    $("#cl-wrapper").css({opacity:1,'margin-left':0});
                });
				$(document).ready(function(){
				  $("#forgot").click(function(){
					$("#login").slideUp(300);
					$("#lupa").slideDown(300);
				  });
				  $("#kembali").click(function(){
					$("#login").slideDown(300);
					$("#lupa").slideUp(300);
				  });
				});
            </script>

            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="js/behaviour/voice-commands.js"></script>
            <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/jquery.flot/jquery.flot.js"></script>
            <script type="text/javascript" src="js/jquery.flot/jquery.flot.pie.js"></script>
            <script type="text/javascript" src="js/jquery.flot/jquery.flot.resize.js"></script>
            <script type="text/javascript" src="js/jquery.flot/jquery.flot.labels.js"></script>
        </body>

    </html>
<!--     <//?php
}
?>
