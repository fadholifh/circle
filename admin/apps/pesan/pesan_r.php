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
                    <li><a href="?mod=pesan&act=t">pesan</a></li>
                    <li class="active">Tampil Pesan</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="header">
                    <h3><i class="fa fa-envelope nav-icon"></i> Tampil Pesan</h3>
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
                        $sql    =   "SELECT a.*, b.nama as penerima FROM pesan a 
                        INNER JOIN user b ON a.penerima_id = b.nim
                        WHERE pesan_id=$id";
                            $query  = mysqli_query($con, $sql);
                            $no=0;
                            while ($row = mysqli_fetch_array($query))
                            {
                         ?>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">ID Pesan</label>
                            <div class="col-sm-6">
                                <?php echo $row['pesan_id'];  ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Penerima Pesan</label>
                            <div class="col-sm-6">
                                <?php echo $row['penerima'];  ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">NIM Pengirim Pesan</label>
                            <div class="col-sm-6">
                                <?php echo $row['pengirim_id']; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">isi Pesan</label>
                            <div class="col-sm-6">
                                <?php echo $row['isi'];  ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Waktu Mengirim Pesan</label>
                            <div class="col-sm-6">
                                <?php echo $row['waktu'];  ?>
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
