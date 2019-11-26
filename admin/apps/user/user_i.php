<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nim = $_POST['nim'];
        $password = md5($_POST['password']);
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $tempat = $_POST['tempat'];
        $ttl = $_POST['ttl'];
        $phone = $_POST['phone'];
        $work = $_POST['work'];
        $level = $_POST['level'];
        $avatar = "default/no-ava.png";
        $dr = now();
        $bio = "-";
        if (!empty($status)) {
            $status = 1;
        } else {
            $status = 0;
        }

        $query = $con->prepare("SELECT nim FROM user WHERE nim='" . $_POST["nim"] . "'");
        $query->execute();
        $query->store_result();

        $ttid = $query->num_rows;

        if($ttid>= 1) {
          echo "nim sudah dipakai";
          Redir('admin.php?mod=404&act=t');
          exit;
        }

        $query1 = $con->prepare("SELECT email FROM user WHERE email='" . $_POST["email"] . "'");
        $query1->execute();
        $query1->store_result();

        $ttem = $query1->num_rows;

        if($ttem>= 1) {
          header('location:../../../404.html');
          Redir('admin.php?mod=404&act=t');
          exit;
        }

        $sql = "INSERT INTO user (nim, nama, password, email, alamat, tempat_lahir, ttl, no_hp, work, bio, registered, userg_id, status)
        VALUES ('$nim','$nama','$password','$email','$alamat','$tempat','$ttl','$phone','$work','$bio','$dr','$level','$status')";

        if ($con->query($sql) === TRUE) {
            Redir('admin.php?mod=user&act=t');
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
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
        <?php } ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">NIM</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="nim" id="nim" onBlur="checkAvailabilityNIM()" required placeholder="Ex.15111234" >
                                <span id="user-availability-status"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">E-Mail</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="email" id="email" onBlur="checkAvailabilityEmail()" required>
                                <span id="email-availability-status"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Lengkap</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="alamat"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tempat Lahir</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="tempat">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal Lahir</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" name="ttl">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">No HP</label>
                            <div class="col-sm-6">
                                <input type="text" name="phone" class="form-control"/>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kerja</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="work">
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
        while ($row = mysqli_fetch_array($query))
        {
            ?>
                                        <option value="<?php echo $row['userg_id']; ?>"><?php echo $row['nama']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div><h5><a href="admin.php?mod=user_group&act=i" target="_blank"><i class="fa fa-plus"></i> Level</a></h5>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-6">
                                <input class="switch" type="checkbox" data-on-color="success" data-size="small" name="status" <?php //if ($row['status'] == 1) { echo 'checked="checked"';} ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <button class="btn btn-primary" type="submit">Tambah</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    <?php
} ?>
