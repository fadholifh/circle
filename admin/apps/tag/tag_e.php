<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {
  $id=$_GET["id"];
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      $id = $_POST['tag_id'];
      $nama = $_POST['nama'];
      $status = @$_POST['status'];
      if (!empty($status)) {
          $status = 1;
      } else {
          $status = 0;
      }

      $sql = "UPDATE tag SET nama='$nama', status='$status' WHERE tag_id=$id";

      if ($con->query($sql) === TRUE) {
          Redir('admin.php?mod=tag&act=t');
      } else {
          echo "Error: " . $sql . "<br>" . $con->error;
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
                    <li><a href="#">Admin</a></li>
                    <li><a href="?mod=tag&act=t">Tag</a></li>
                    <li class="active">Edit Tag</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="header">
                    <h3><i class="fa fa-tags nav-icon"></i> Tambah Tag</h3>
                </div>
                <div class="content">
                    <form class="form-horizontal group-border-dashed" style="border-radius: 0px;" role="form" method="post" action="">
                        <?php
                        if (isset($msg_error)) {
                            ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-times-circle  sign"></i><strong>Error!</strong> Tidak Boleh Kosong!
                            </div>
                        <?php } ?>
                        <?php
                        $id=$_GET["id"];
                        $sql    =   "SELECT * FROM tag WHERE tag_id=$id";
                            $query  = mysqli_query($con, $sql);
                            $no=0;
                            while ($row = mysqli_fetch_array($query))
                            {
                         ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-6">
                                <input type="hidden" name="tag_id" class="form-control" value="<?php echo $row['tag_id']; ?>">
                                <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']?>">
                            </div>
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
                                <button class="btn btn-primary" type="submit">Tambah</button>
                            </div>
                        </div>
                      <?php } ?>
                </div>
                </form>
            </div>
        </div>
    <?php } ?>
<?php } ?>
