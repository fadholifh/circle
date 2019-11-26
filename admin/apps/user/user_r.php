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
                    <li><a href="?mod=user&act=t">user</a></li>
                    <li class="active">Tampil User</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="header">
                    <h3><i class="fa fa-user nav-icon"></i> Tampil User</h3>
                </div>
                <div class="content">
                    <form class="form-horizontal group-border-dashed" style="border-radius: 0px;" role="form" method="post" action="">
                        <?php
                        $id=$_GET["id"];
                        $sql    =   "SELECT a.*, b.nama as ug FROM user a  
                        INNER JOIN userg b
                        ON a.userg_id = b.userg_id
                        WHERE a.nim=$id";
                            $query  = mysqli_query($con, $sql);
                            $no=0;
                            while ($row = mysqli_fetch_array($query))
                            {
                         ?>



                        <div class="form-group">
                            <label class="col-sm-3 control-label">ID User</label>
                            <div class="col-sm-6">
                                <?php echo $row['nim'];  ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <?php echo $row['email'];  ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-6">
                                <?php echo $row['nama'];  ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-6">
                                <?php echo $row['alamat'];  ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tempat Lahir</label>
                            <div class="col-sm-6">
                                <?php echo $row['tempat_lahir'];  ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
                            <div class="col-sm-6">
                                <?php echo $row['ttl'];  ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">IMG</label>
                            <div class="col-sm-6">
                                <?php echo $row['img'];  ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nomor Telepon</label>
                            <div class="col-sm-6">
                                <?php echo $row['no_hp'];  ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pekerjaan</label>
                            <div class="col-sm-6">
                                <?php echo $row['work'];  ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Bio</label>
                            <div class="col-sm-6">
                                <?php echo $row['bio'];  ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Waktu Registrasi</label>
                            <div class="col-sm-6">
                                <?php echo $row['registered'];  ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Level</label>
                            <div class="col-sm-6">
                                <?php echo $row['ug'];  ?>
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

                </div>
                </form>
            </div>
        </div>
<?php  }

}
?>
