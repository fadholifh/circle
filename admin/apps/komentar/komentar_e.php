<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $post_id = $_POST['post_id'];
        $isi = $_POST['isi'];
        $waktu = $_POST['waktu'];
        $penulis = $_POST['penulis'];
        $status = @$_POST['status'];
        if (!empty($status)) {
            $status = 1;
        } else {
            $status = 0;
        }

        $id = $_POST['id'];
        $sql = "UPDATE komentar SET
               post_id='$post_id',
               isi='$isi',
               waktu='$waktu',
               penulis='$penulis',
               status='$status'
               WHERE komentar_id='$id'";

        if ($con->query($sql) === TRUE) {
            Redir('admin.php?mod=komentar&act=t');
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
                    <li><a href="#">Digilib</a></li>
                    <li><a href="?mod=komentar&amp;act=t">komentar</a></li>
                    <li class="active">Tambah Komentar</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="header">
                    <h3><i class="fa fa-file-o nav-icon"></i> Edit komentar</h3>
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
            $sqls    =   "SELECT * FROM komentar WHERE komentar_id=$id";
                $querys  = mysqli_query($con, $sqls);
                $no=0;
                while ($rows = mysqli_fetch_array($querys))
                {
        ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Post</label>
                            <div class="col-sm-6">
                                <select class="select2" name="post_id">
                                    <?php

                                        $sql1    =   'SELECT * FROM post WHERE status=1';
                                        $query1  = mysqli_query($con, $sql1);
                                        $no=0;
                                        while ($row1 = mysqli_fetch_array($query1))
                                        {
                                            ?>
                                    <option value="<?php echo $row1['post_id']; ?>" <?php if($row1['post_id'] == $rows['post_id']){echo "selected = 'selected'";} ?>><?php echo $row1['judul']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Isi</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="isi"><?php echo $rows['isi']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">waktu</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control datetime" name="waktu" value="<?php echo $rows['waktu'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Penulis</label>
                            <div class="col-sm-6">
                                <input type="hidden" name="id" value="<?php echo $rows['komentar_id']; ?>">
                                <select class="select2" name="penulis">
                                    <?php

                                        $sql    =   'SELECT * FROM user WHERE status=1';
                                        $query  = mysqli_query($con, $sql);
                                        $no=0;
                                        while ($row1 = mysqli_fetch_array($query))
                                        {
                                            ?>
                                    <option  value="<?php echo $row1['nim']; ?>" <?php if($row1['nim'] == $rows['penulis']){echo "selected = 'selected'";} ?>><?php echo $row1['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-6">
                                <input class="switch" type="checkbox" data-on-color="success" data-size="small" name="status" <?php if ($rows['status'] == 1) { echo 'checked="checked"';} ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                </div>
                <?php } ?>
                </form>
            </div>
        </div>
    <?php } ?>
<?php } ?>
