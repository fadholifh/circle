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
                    <li><a href="?mod=forum&act=t">forum</a></li>
                    <li class="active">Tampil Forum</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="header">
                    <h3><i class="fa fa-comments-o nav-icon"></i> Tampil Forum</h3>
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
                        $sql    =   "SELECT * FROM forum WHERE forum_id=$id";
                            $query  = mysqli_query($con, $sql);
                            $no=0;
                            while ($row = mysqli_fetch_array($query))
                            {
                         ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ID Forum</label>
                            <div class="col-sm-6">
                                <?php echo $row['forum_id'];  ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Forum</label>
                            <div class="col-sm-6">
                                <?php echo $row['nama'] ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal Dibuat</label>
                            <div class="col-sm-6">
                                <?php echo $row['created'] ?>
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
