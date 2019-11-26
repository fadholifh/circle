<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      $nama = $_POST['nama'];
      $created = date('Y-m-d H:i:s');
      $status = @$_POST['status'];
      if (!empty($status)) {
          $status = 1;
      } else {
          $status = 0;
      }

      $sql = "INSERT INTO forum (nama, created, status)
      VALUES ('$nama', '$created', '$status')";

      if ($con->query($sql) === TRUE) {
          Redir('admin.php?mod=forum&act=t');
      } else {
          echo "Error: " . $sql . "<br>" . $con->error;
      }
  }


    if (1 == 0) {
        //er('');
        //echo '';
    } else {
        ?>
        <div class="cl-mcont">
            <div class="page-head">
                <ol class="breadcrumb">
                    <li><a href="#">Digilib</a></li>
                    <li><a href="?mod=forum&act=t">Forum</a></li>
                    <li class="active">Tambah Forum</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="header">
                    <h3><i class="fa fa-comments-o nav-icon"></i> Tambah Forum</h3>
                </div>
                <div class="content">
                    <form class="form-horizontal group-border-dashed" style="border-radius: 0px;" enctype="multipart/form-data" role="form" method="post" action="">
<!--                             <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-times-circle  sign"></i><strong>Error!</strong> Tidak Boleh Kosong!
                            </div> -->
                        <?php } ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-1">
                                <input class="switch" type="checkbox" data-on-color="success" data-size="small" name="status">
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
<?php } ?>
