<div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url(assets/img/login.jpg)"></div>
        <div class="container">
            <div class="col-md-9 content-center">
                <div class="card card-plain">
                    <form class="form" method="POST" action="index.php?mod=forum&act=s">
                        <div class="header header-primary text-center">
                        </div>
                        <div class="content">
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="fa fa-search"></i>
                                </span>
                                <input type="text" name="q" class="form-control" placeholder="Cari...">
                            </div>
                            <center><button class="btn btn-primary btn-round btn-lg btn-block col-lg-2"><i class="fa fa-search"></i></button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
<div id="fixed_button3" class="but3" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-plus" style="padding-top:18px;"></i>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                        <h4 class="title title-up">Tambah Post</h4>
                    </div>
                    <div class="modal-body">
                      <div class="content">
                          <form class="form-horizontal group-border-dashed" style="border-radius: 0px;" enctype="multipart/form-data" role="form" method="POST" action="index.php?mod=post&act=i">
              <?php
              if (isset($msg_error)) {
                  ?>
                                  <div class="alert alert-danger">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <i class="fa fa-times-circle  sign"></i><strong>Error!</strong> Tidak Boleh Kosong!
                                  </div>
              <?php } ?>
                              <div class="form-group">
                                  <label class="col-sm-12 control-label text-center">Forum</label>
                                  <div class="col-sm-12">
                                      <select class="form-control" name="forum_id" id="pilih">
                                          <?php

                                              $sql1    =   'SELECT * FROM forum WHERE status=1';
                                              $query1  = mysqli_query($con, $sql1);
                                              $no=0;
                                              while ($row1 = mysqli_fetch_array($query1))
                                              {
                                                  ?>
                                          <option value="<?php echo $row1['forum_id']; ?>"><?php echo $row1['nama']; ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-12 control-label text-center">Judul</label>
                                  <div class="col-sm-12">
                                      <input type="text" class="form-control" placeholder="Judul" name="judul" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-12 control-label text-center">Isi</label>
                                  <div class="col-sm-12">
                                      <textarea id="summernote" class="form-control" name="isi" placeholder="isi"></textarea>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-12 control-label text-center">Cover Post</label>
                                  <div class="col-sm-12">
                                      <input type="file" class="form-control" name="img">
                                  </div>
                              </div>
                              <div id="loker">
                              <div class="form-group">
                                  <label class="col-sm-12 control-label text-center">Logo Perusahaan</label>
                                  <div class="col-sm-12">
                                      <input type="file" class="form-control" name="file">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-12 control-label text-center">Waktu Deadline</label>
                                  <div class="col-sm-12">
                                      <input type="datetime-local" class="form-control" name="w_deadline" value="<?php echo now(); ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-12 control-label text-center">Gaji</label>
                                  <div class="col-sm-12">
                                      <input type="number" class="form-control" name="gaji" value="0">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-12 control-label text-center">Kota Penempatan</label>
                                  <div class="col-sm-12">
                                      <input type="text" class="form-control" name="kota_penempatan" value="-">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-12 control-label text-center">Email</label>
                                  <div class="col-sm-12">
                                      <input type="email" class="form-control" name="email" value="e@examples.com">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-12 control-label text-center">No Telp</label>
                                  <div class="col-sm-12">
                                      <input type="text" class="form-control" name="no_hp" value="-">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-12 control-label text-center">Tipe Lowker</label>
                                  <div class="col-sm-12">
                                      <select class="form-control" name="lowker_id">
                                          <?php
                                              $sql    =   "SELECT * FROM lowker WHERE status=1";
                                              $query  = mysqli_query($con, $sql);
                                              $no=0;
                                              while ($row = mysqli_fetch_array($query))
                                              {
                                                  ?>
                                          <option  value="<?php echo $row['lowker_id']; ?>"><?php echo $row['tipe']; ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                              </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-12 control-label text-center">Tag</label>
                                  <div class="col-sm-12">
                                      <select class="select2" multiple name="tag_id[]">
                                          <?php
                                              $sql    =   "SELECT * FROM tag WHERE status=1";
                                              $query  = mysqli_query($con, $sql);
                                              $no=0;
                                              while ($row = mysqli_fetch_array($query))
                                              {
                                                  ?>
                                          <option  value="<?php echo $row['tag_id']; ?>"><?php echo $row['nama']; ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-12 control-label text-center">Status</label>
                                  <div class="col-sm-12 text-center">
                                      <input class="bootstrap-switch" type="checkbox" data-on-color="success" data-size="small" name="status">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-12 control-label text-center"></label>
                                  <div class="col-sm-12 text-center">
                                      <button class="btn btn-primary" type="submit">Tambah</button>
                                  </div>
                              </div>
                      </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link text-white">.</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
<div class="container">
<!-- //loop -->
<?php
$id = $_GET['id'];
if($id==1){
  $sql    =   "SELECT a.*, b.tipe FROM post a INNER JOIN lowker b ON a.lowker_id = b.lowker_id WHERE a.status=1 AND a.forum_id='$id' ORDER BY a.waktu DESC";
      $query  = mysqli_query($con, $sql);
      $no=0;
      while ($row = mysqli_fetch_array($query))
      {
?>
  <div class="row justify-content-md-center">
    <div class="text-center col-md-8 col-lg-3">
      <div class="image">
        <img class="d-block img img-responsive" height="290px" src="d_media/post/<?php echo $row['img'] ?>">
      </div>
    </div>
    <?php
    $k = $row['post_id'];
    $sql1    =   "SELECT komentar_id FROM Komentar WHERE post_id='$k'";
    $query1  = mysqli_query($con, $sql1);
    $com = $query1->num_rows;
    ?>
        <div class="col-md-12 col-lg-8 row">
          <p class="col-md-4" style="padding-top: 10px;"><b>Deadline <?php echo $row['w_deadline'] ?></b></p>
          <p class="col-md-4" style="padding-top: 10px;"><i class="fa fa-comment-o"></i> <?php echo $com; ?></p>
          <p class="col-md-4" style="padding-top: 10px;"><i class="fa fa-map-marker"></i>  <?php echo $row['kota_penempatan'] ?></p>
            <div class="col-md-12">
                <h4><b><a href="index.php?mod=forum&act=det&id=<?php echo $row['post_id'] ?>"><?php echo $row['judul'] ?></a></b></h4>
                <?php echo substr(strip_tags(html_entity_decode($row['isi'])),0,210) ?>. . .
                <br/>
            </div>
            <p class="col-md-4" style="padding-top: 10px;">
              <a href="index.php?mod=forum&act=det&id=<?php echo $row['post_id'] ?>"><i class="fa fa-plus"></i>  Lanjutkan membaca</a></p>

              <p class="col-md-4" style="padding-top: 10px">
                <?php if (isset($_SESSION['login'])==$row['penulis']) { ?>
                <a style="background-color:#f39c12;width:30px;height:30px;padding:2px 10px 2px 10px; color:white;" class="label label-default" href="?mod=post&amp;act=e&amp;id=<?php echo $row['post_id']; ?>"><i class="fa fa-pencil"></i></a>
                <a style="background-color:#c0392b;width:30px;height:30px;padding:2px 10px 2px 10px; color:white;" class="label label-danger" href="?mod=post&amp;act=d&amp;id=<?php echo $row['post_id']; ?>&f=<?php echo $row['forum_id']; ?>" onClick="javascript: return confirm('Apakah anda ingin menghapus?');"><i class="fa fa-trash"></i></a><span class="col-lg-offset-2"></span>
                <?php } ?>
              </p>

              <p class="col-md-4" style="padding-top: 10px">
                <a style="background-color:#3498db;width:30px;height:30px;padding:2px 10px 2px 10px; color:white;" class="label label-default"><b><?php echo $row['tipe'] ?></b></a>
              </p>
       </div>
  </div>
<?php } ?>
  <!-- //endlop -->
<?php }else{
  $sql    =   "SELECT a.*, b.tipe FROM post a INNER JOIN lowker b ON a.lowker_id = b.lowker_id WHERE a.status=1 AND a.forum_id='$id' ORDER BY a.waktu DESC";
      $query  = mysqli_query($con, $sql);
      $no=0;
      while ($row = mysqli_fetch_array($query))
      {
?>
  <div class="row justify-content-md-center">
    <div class="text-center col-md-8 col-lg-3">
      <div class="image">
        <img class="d-block img img-responsive" src="d_media/post/<?php echo $row['img'] ?>">
      </div>
    </div>
<?php
$k = $row['post_id'];
$sql1    =   "SELECT komentar_id FROM Komentar WHERE post_id='$k'";
$query1  = mysqli_query($con, $sql1);
$com = $query1->num_rows;
    ?>
        <div class="col-md-12 col-lg-8 row">
          <p class="col-md-4" style="padding-top: 10px;"><?php echo time_elapsed_string($row['waktu']) ?></b></p>
          <p class="col-md-4" style="padding-top: 10px;"><i class="fa fa-comment-o"></i>  <?php echo $com; ?> Komentar</p>
            <div class="col-md-12">
                <h4><b><a href="index.php?mod=forum&act=det&id=<?php echo $row['post_id'] ?>"><?php echo $row['judul'] ?></a></b></h4>
                <?php echo substr(strip_tags(html_entity_decode($row['isi'])),0,210) ?>. . .
                <br/>
            </div>
            <p class="col-md-4" style="padding-top: 10px;"><a href="index.php?mod=forum&act=det&id=<?php echo $row['post_id'] ?>"><i class="fa fa-plus"></i>  Lanjutkan membaca</a></p>
            <p class="col-md-4" style="padding-top: 10px">
              <?php if (isset($_SESSION['login'])==$row['penulis']) { ?>
              <a style="background-color:#f39c12;width:30px;height:30px;padding:2px 10px 2px 10px; color:white;" class="label label-default" href="?mod=post&amp;act=e&amp;id=<?php echo $row['post_id']; ?>"><i class="fa fa-pencil"></i></a>
              <a style="background-color:#c0392b;width:30px;height:30px;padding:2px 10px 2px 10px; color:white;" class="label label-danger" href="?mod=post&amp;act=d&amp;id=<?php echo $row['post_id']; ?>&f=<?php echo $row['forum_id']; ?>" onClick="javascript: return confirm('Apakah anda ingin menghapus?');"><i class="fa fa-trash"></i></a><span class="col-lg-offset-2"></span>
              <?php } ?>
            </p>
            </p>
       </div>
  </div>
  <!-- //endlop -->
<?php }
}?>
</div>
