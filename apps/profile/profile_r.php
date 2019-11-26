<?php
$id=$_GET['id'];
    $sql    =   "SELECT * FROM user WHERE nim=$id";
    $query  = mysqli_query($con, $sql);
    $no=0;
    while ($row = mysqli_fetch_array($query))
    {
?>
    <div class="profile-page sidebar-collapse">
        <div class="wrapper">
            <div class="page-header page-header-small" filter-color="blue">
                <div class="page-header-image" data-parallax="true" style="background-image: url('assets/img/bg11.jpg');">
                </div>
                <div class="container">
                    <div class="content-center">
                        <div class="photo-container">
                            <img src="d_media/avatar/<?php echo $row['img']; ?>" class="Thumbnail Image" style="height:100%" alt="">
                        </div>
                        <h3 class="title"><?php echo $row['nama']; ?></h3>
                        <p class="category">
                            <?php echo $row['work']; ?>
                        </p>
                        <div class="content">
                            <div class="social-description">
                                <p>Total Postingan</p>
                                <h3><?php
                            $id=$_GET['id'];
                            $sql    =   "SELECT count(post_id) as c FROM post WHERE penulis=$id";
                            $query  = mysqli_query($con, $sql);
                            $no=0;
                            while ($rowsp = mysqli_fetch_array($query))
                            {

                            echo $rowsp['c']; } ?></h3>
                            </div>
                            <div class="social-description">
                                <p>Member Dari</p>
                                <h3><?php echo date("Y", strtotime($row['registered'])) ?></h3>
                            </div>
                            <div class="social-description">
                                <p>Angkatan</p>
                                <h3>20<?php echo substr($row['nim'],0,2); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="container">
                    <div class="button-container">
                        <a href="#button" class="btn btn-primary btn-round btn-lg">Ikuti</a>
                        <a href="#button" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Kirim Pesan">
                        <i class="fa fa-envelope"></i>
                    </a>
                    </div>
                    <h3 class="title">Tentang</h3>
                    <p class="description">Orang biasa memanggil saya
                        <?php echo $row['nama']; ?>, bidang keahlian saya adalah koding dan juga sedikit pada jaringan. Untuk progam sendiri, saya lebih mahir untuk website. Asal saya dari
                        <?php echo $row['tempat_lahir']; ?>. Untuk sekarang saya sedang menempuh pendidikan sarjana di Universitas AMIKOM Yogyakarta. Alamat saya adalah
                        <?php echo $row['alamat']; ?>. Saya lahir di
                        <?php echo $row['tempat_lahir']; ?>,
                        <?php echo $row['ttl']; ?>. Nomor Telepon saya adalah
                        <?php echo $row['no_hp']; ?> Bisa menghubungi saya dengan email
                        <?php echo $row['email']; ?> Status saya adalah Mahasiswa dengan Jurusan Teknik Informatika
                    </p>
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <h4 class="title text-center">Postingan</h4>
                            <div class="nav-align-center">
                                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#lowker" role="tablist">
                                        <i class="fa fa-bullhorn"></i>
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#sharing" role="tablist">
                                        <i class="fa  fa-share-alt"></i>
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="modal" data-target="#myModal">
                                        <i class="fa  fa-pencil"></i>
                                    </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content gallery">
                            <div class="tab-pane " id="lowker" role="tabpanel">
                                <div class="col-md-10 ml-auto mr-auto">
                                    <div class="row collections">
                                        <?php
                                      $sqls    =   "SELECT a.*, b.tipe FROM post a INNER JOIN lowker b ON a.lowker_id = b.lowker_id INNER JOIN user c ON a.penulis = c.nim WHERE a.penulis='$id' AND a.forum_id = 1 ORDER BY a.waktu DESC";
                                      $querys  = mysqli_query($con, $sqls);
                                      $no=0;
                                      while ($rows = mysqli_fetch_array($querys))
                                      {
                                  ?>
                                  <div class="col-md-4">
                                      <div class="product-div2">
                                          <img src="d_media/post/<?php echo $rows['img']; ?>" class="img-responsive transition">
                                          <div class="text-view transition">
                                              <p><?php echo $rows['judul']; ?></p>
                                              <?php if (isset($_SESSION['login'])&& $_SESSION['login'] == $rows['penulis']) { ?>
                                              <a href="index.php?mod=forum&act=det&id=<?php echo $rows['post_id']; ?>" class="btn-primary" style="padding:6px 10px 6px 10px;"><i class="fa fa-eye text-white"></i></a>
                                              <a href="index.php?mod=post&act=e&id=<?php echo $rows['post_id']; ?>" class="btn-info" style="padding:6px 10px 6px 10px;"><i class="fa fa-pencil text-white"></i></a>
                                              <a href="index.php?mod=post&act=d&id=<?php echo $rows['post_id']; ?>&f=<?php echo $rows['forum_id']; ?>" class="btn-danger" style="padding:6px 10px 6px 10px;" onClick="javascript: return confirm('Apakah anda ingin menghapus?');"><i class="fa fa-trash text-white"></i></a>
                                              <a>.</a>
                                              <?php } ?>
                                          </div>
                                      </div>
                                  </div>
                                            <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane active" id="sharing" role="tabpanel">
                                <div class="col-md-10 ml-auto mr-auto">
                                    <div class="row collections">
                                        <div class="row">
                                          <?php $sqls="SELECT a.*, b.tipe FROM post a INNER JOIN lowker b ON a.lowker_id = b.lowker_id INNER JOIN user c ON a.penulis = c.nim WHERE a.penulis='$id' AND a.forum_id != 1 ORDER BY a.waktu DESC" ;
                                              $querys=mysqli_query($con, $sqls); $no=0;
                                              while ($rows=mysqli_fetch_array($querys)) { ?>
                                                <div class="col-md-4">
                                                    <div class="product-div2">
                                                        <img src="d_media/post/<?php echo $rows['img']; ?>" class="img-responsive transition">
                                                        <div class="text-view transition">
                                                            <p><?php echo $rows['judul']; ?></p>
                                                            <?php if (isset($_SESSION['login'])&& $_SESSION['login'] == $rows['penulis']) { ?>
                                                            <a href="index.php?mod=forum&act=det&id=<?php echo $rows['post_id']; ?>" class="btn-primary" style="padding:6px 10px 6px 10px;"><i class="fa fa-eye text-white"></i></a>
                                                            <a href="index.php?mod=post&act=e&id=<?php echo $rows['post_id']; ?>" class="btn-info" style="padding:6px 10px 6px 10px;"><i class="fa fa-pencil text-white"></i></a>
                                                            <a href="index.php?mod=post&act=d&id=<?php echo $rows['post_id']; ?>&f=<?php echo $rows['forum_id']; ?>" class="btn-danger" style="padding:6px 10px 6px 10px;" onClick="javascript: return confirm('Apakah anda ingin menghapus?');"><i class="fa fa-trash text-white"></i></a>
                                                            <a>.</a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php } ?>
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
                                                <option value="<?php echo $row1['forum_id']; ?>">
                                                    <?php echo $row1['nama']; ?>
                                                </option>
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
                                                    <option value="<?php echo $row['lowker_id']; ?>">
                                                        <?php echo $row['tipe']; ?>
                                                    </option>
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
                                                <option value="<?php echo $row['tag_id']; ?>">
                                                    <?php echo $row['nama']; ?>
                                                </option>
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
