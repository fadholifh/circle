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
                    <li><a href="?mod=komentar&act=t">komentar</a></li>
                    <li class="active">Tampil Komentar</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="header">
                    <h3><i class="fa fa-comment-o nav-icon"></i> Tampil Komentar</h3>
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
                        $sql    =   "SELECT a.*, b.judul, c.nama FROM komentar a 
                        INNER JOIN post b ON a.post_id = b.post_id 
                        INNER JOIN user c ON a.penulis = c.nim 
                        WHERE komentar_id=$id";
                            $query  = mysqli_query($con, $sql);
                            $no=0;
                            while ($row = mysqli_fetch_array($query))
                            {
                         ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ID Komentar</label>
                            <div class="col-sm-6">
                                <?php echo $row['komentar_id'];  ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                        <label class="col-sm-3 control-label">Pada Postingan Dengan Judul</label>
                            <div class="col-sm-6">
                                <?php echo $row['judul'] ?>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-sm-3 control-label">Isi Komentar</label>
                            <div class="col-sm-6">
                                <?php echo $row['isi'] ?>
                            </div>
                        </div>                        
                        
                        <div class="form-group">
                        <label class="col-sm-3 control-label">Waktu Komentar</label>
                            <div class="col-sm-6">
                                <?php echo $row['waktu'] ?>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-sm-3 control-label">Penulis Komentar</label>
                            <div class="col-sm-6">
                                <?php echo $row['nama'] ?>
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
