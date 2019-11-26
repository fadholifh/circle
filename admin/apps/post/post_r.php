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
                    <li><a href="?mod=post&act=t">post</a></li>
                    <li class="active">Tampil post</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="header">
                    <h3><i class="fa fa-pencil-square-o nav-icon"></i> Tampil post</h3>
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
                        $sql    =   "SELECT a.*, b.nama as user, c.nama as forum, d.tipe FROM post a
                        INNER JOIN user b ON a.penulis = b.nim
                        INNER JOIN forum c ON a.forum_id = c.forum_id
                        INNER JOIN lowker d ON a.lowker_id = d.lowker_id
                        WHERE post_id=$id";
                            $query  = mysqli_query($con, $sql);
                            $no=0;
                            while ($row = mysqli_fetch_array($query))
                            {
                         ?>
                         <div class="form-group">
                         <label class="col-sm-3 control-label">ID Postingan</label>
                             <div class="col-sm-6">
                                 <?php echo $row['post_id'] ?>
                             </div>
                         </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Judul</label>
                            <div class="col-sm-6">
                                <?php echo $row['judul']; echo "<br />"; ?>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label">Isi Postingan</label>
                            <div class="col-sm-6">
                                <?php echo strip_tags(html_entity_decode($row['isi'])); ?>
                            </div>
                        </div>
                        <?php if($row['forum_id'] == 1){ ?>
                          <div class="form-group">
                          <label class="col-sm-3 control-label">Logo Perusahaan</label>
                              <div class="col-sm-6">
                                  <img width="100px" src="../d_media/post/<?php echo $row['file'] ?>" />
                              </div>
                          </div>
                          <div class="form-group">
                          <label class="col-sm-3 control-label">Gaji</label>
                              <div class="col-sm-6">
                                  <?php echo $row['gaji'] ?>
                              </div>
                          </div>

                          <div class="form-group">
                          <label class="col-sm-3 control-label">Kota Penempatan</label>
                              <div class="col-sm-6">
                                  <?php echo $row['kota_penempatan'] ?>
                              </div>
                          </div>

                          <div class="form-group">
                          <label class="col-sm-3 control-label">Email</label>
                              <div class="col-sm-6">
                                  <?php echo $row['email'] ?>
                              </div>
                          </div>

                          <div class="form-group">
                          <label class="col-sm-3 control-label">Nomor Telepon Perusahaan</label>
                              <div class="col-sm-6">
                                  <?php echo $row['no_hp'] ?>
                              </div>
                          </div>

                          <div class="form-group">
                          <label class="col-sm-3 control-label">Lowker</label>
                              <div class="col-sm-6">
                                  <?php echo $row['tipe'] ?>
                              </div>
                          </div>
                          <div class="form-group">
                          <label class="col-sm-3 control-label">Waktu Deadline</label>
                              <div class="col-sm-6">
                                  <?php echo $row['w_deadline'] ?>
                              </div>
                          </div>

                        <?php }else{ ?>
                          .
                      <?php } ?>
                      <div class="form-group">
                      <label class="col-sm-3 control-label">Waktu Post</label>
                          <div class="col-sm-6">
                              <?php echo $row['waktu'] ?>
                          </div>
                      </div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label">Forum</label>
                            <div class="col-sm-6">
                                <?php echo $row['forum'] ?>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-sm-3 control-label">Cover Post</label>
                            <div class="col-sm-6">
                                <img width="100px" src="../d_media/post/<?php echo $row['img'] ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-sm-3 control-label">Penulis</label>
                            <div class="col-sm-6">
                                <?php echo $row['user'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label">Tag</label>
                            <div class="col-sm-6">
                                <?php
                                $a = $row['tag_id'];
                                    $arr = explode(",",$a);
                                    foreach ($arr as $tag) {
                                        $q = "SELECT nama FROM tag WHERE tag_id='$tag'";
                                        $query = mysqli_query($con, $q);
                                        $b = mysqli_fetch_array($query);
                                            echo $b['nama'].",";
                                    }
                                    ?>

                            </div>
                        </div>
                      <?php } ?>
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
<?php } ?>
