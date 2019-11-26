<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $pengirim_id = $_POST['pengirim_id'];
        $penerima_id = $_POST['penerima_id'];
        $waktu = $_POST['waktu'];
        $isi = $_POST['isi'];
        $status = @$_POST['status'];
        if (!empty($status)) {
            $status = 1;
        } else {
            $status = 0;
        }

        $id = $_POST['id'];
        $sql = "UPDATE pesan SET
               pengirim_id='$pengirim_id',
               penerima_id='$penerima_id',
               isi='$isi',
               waktu='$waktu',
               status='$status'
               WHERE pesan_id='$id'";

        if ($con->query($sql) === TRUE) {
            Redir('admin.php?mod=pesan&act=t');
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
                    <li><a href="?mod=pesan&amp;act=t">pesan</a></li>
                    <li class="active">Tambah Pesan</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="header">
                    <h3><i class="fa fa-file-o nav-icon"></i> Edit Pesan</h3>
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
            $sqls    =   "SELECT * FROM pesan WHERE pesan_id=$id";
                $querys  = mysqli_query($con, $sqls);
                $no=0;
                while ($rows = mysqli_fetch_array($querys))
                {
        ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pengirim</label>
                            <div class="col-sm-6">
                                <select class="select2" name="pengirim_id">
                                    <?php

                                        $sql1    =   'SELECT * FROM user WHERE status=1';
                                        $query1  = mysqli_query($con, $sql1);
                                        $no=0;
                                        while ($row1 = mysqli_fetch_array($query1))
                                        {
                                            ?>
                                    <option value="<?php echo $row1['nim']; ?>" <?php if($row1['nim'] == $rows['pengirim_id']){echo "selected = 'selected'";} ?>><?php echo $row1['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Penerima</label>
                            <div class="col-sm-6">
                                <input type="hidden" name="id" value="<?php echo $rows['pesan_id']; ?>">
                                <select class="select2" name="penerima_id">
                                    <?php

                                        $sql    =   'SELECT * FROM user WHERE status=1';
                                        $query  = mysqli_query($con, $sql);
                                        $no=0;
                                        while ($row = mysqli_fetch_array($query))
                                        {
                                            ?>
                                    <option  value="<?php echo $row['nim']; ?>" <?php if($row['nim'] == $rows['penerima_id']){echo "selected = 'selected'";} ?>><?php echo $row['nama']; ?></option>
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
