<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {
  $id=$_GET["id"];
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $forum = $_POST['forum'];
      $lowker = $_POST['lowker'];
      $user = $_POST['user'];
      $post = $_POST['post'];
      $komentar = $_POST['komentar'];
      $userg = $_POST['userg'];
      $pesan = $_POST['pesan'];
      $tag = $_POST['tag'];
      $status = @$_POST['status'];
      if (!empty($status)) {
          $status = 1;
      } else {
          $status = 0;
      }
      if (!empty($tag)) {
          $tag = 1;
      } else {
          $tag = 0;
      }
      if (!empty($pesan)) {
          $pesan = 1;
      } else {
          $pesan = 0;
      }
      if (!empty($userg)) {
          $userg = 1;
      } else {
          $userg = 0;
      }
      if (!empty($komentar)) {
          $komentar = 1;
      } else {
          $komentar = 0;
      }
      if (!empty($post)) {
          $post = 1;
      } else {
          $posts = 0;
      }
      if (!empty($forum)) {
          $forum = 1;
      } else {
          $forum = 0;
      }
      if (!empty($lowker)) {
          $lowker = 1;
      } else {
          $lowker = 0;
      }
      if (!empty($user)) {
          $user = 1;
      } else {
          $user = 0;
      }

      $sql = "UPDATE userg SET nama='$nama', forum='$forum', post='$post', tag='$tag', komentar='$komentar', lowker='$lowker', pesan='$pesan', user='$user', userg='$userg', status='$status' WHERE userg_id='$id'";

      if ($con->query($sql) === TRUE) {
          Redir('admin.php?mod=user_group&act=t');
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
                <li class="active">Tambah Tag</li>
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
                        <?php }
                        $sql    =   "SELECT * FROM userg WHERE userg_id=$id";
                        $query  = mysqli_query($con, $sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($query))
                        {
                        ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
                                <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-6">
                                <div class="table-responsive">
                                    <table class="table no-border hover">
                                        <tbody class="no-border-y">
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="forum" <?php if ($row['forum'] == 1) { echo 'checked="checked"'; } ?>> Forum</td>
                                                <td>
                                                    <input type="checkbox" name="post" <?php if ($row['post'] == 1) { echo 'checked="checked"'; } ?>> Post</td>
                                                <td>
                                                    <input type="checkbox" name="tag" <?php if ($row['tag'] == 1) { echo 'checked="checked"'; } ?>> Tag</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="lowker" <?php if ($row['lowker'] == 1) { echo 'checked="checked"'; } ?>> lowker</td>
                                                <td>
                                                    <input type="checkbox" name="komentar" <?php if ($row['komentar'] == 1) { echo 'checked="checked"'; } ?>> Komentar</td>
                                                    <td>
                                                        <input type="checkbox" name="pesan" <?php if ($row['pesan'] == 1) { echo 'checked="checked"'; } ?>> Pesan</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="user" <?php if ($row['user'] == 1) { echo 'checked="checked"'; } ?>> User</td>
                                                <td>
                                                    <input type="checkbox" name="userg" <?php if ($row['userg'] == 1) { echo 'checked="checked"'; } ?>> User Group</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-6">
                                <input class="switch" type="checkbox" data-on-color="success" data-size="small" name="status" <?php if ($row['status'] == 1) { echo 'checked="checked"'; } ?>>
                            </div>
                        </div>
                      <?php } ?>
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
    <?php } ?>
