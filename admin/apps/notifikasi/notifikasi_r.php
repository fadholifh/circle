<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {
        ?>
        <div class="cl-mcont">
            <div class="page-head">
                <ol class="breadcrumb">
                    <li><a href="#">Admin</a></li>
                    <li><a href="?mod=notifikasi&act=t">notifikasi</a></li>
                    <li class="active">Tampil Notifikasi</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="header">
                    <h3><i class="fa fa-envelope nav-icon"></i> Tampil notifikasi</h3>
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
                        $sql    =   "SELECT a.*, b.nama as penerima FROM notifikasi a 
                        INNER JOIN user b ON a.penerima_id = b.nim
                        WHERE notifikasi_id=$id";
                            $query  = mysqli_query($con, $sql);
                            $no=0;
                            while ($row = mysqli_fetch_array($query))
                            {
                         ?>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">ID notifikasi</label>
                            <div class="col-sm-6">
                                <?php echo $row['notifikasi_id'];  ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">NIM Pengirim</label>
                            <div class="col-sm-6">
                                <?php echo $row['pengirim_id']; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Penerima</label>
                            <div class="col-sm-6">
                                <?php echo $row['penerima'];  ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Isi</label>
                            <div class="col-sm-6">
                                <?php echo $row['isi'];  ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Waktu</label>
                            <div class="col-sm-6">
                                <?php echo $row['date'];  ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-6">
                                <?php if($row['status']==1){
                                    $status = "Aktif";
                                }else{
                                    $status = "Tidak Aktif";
                                } 
                                echo $status;  ?>
                            </div>
                        </div>
                        


                      <?php } ?>
                </div>
                </form>
            </div>
        </div>
<?php } ?>
