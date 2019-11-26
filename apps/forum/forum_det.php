<?php
$id = $_GET['id'];
  $sql    =   "SELECT a.*, b.tipe, c.nama as forum, d.img as profile, d.nama as nm FROM post a INNER JOIN lowker b ON a.lowker_id = b.lowker_id INNER JOIN forum c ON a.forum_id = c.forum_id INNER JOIN user d ON a.penulis = d.nim WHERE a.status=1 AND a.post_id='$id' ORDER BY a.waktu DESC";
      $query  = mysqli_query($con, $sql);
      $no=0;
      while ($row = mysqli_fetch_array($query))
      {
        $jml = $query->num_rows;;
        if($jml>0){
          if($row['forum_id']==1){
?><div class="page-header">
    <div class="page-header-image" style="background-image:url(d_media/post/<?php echo $row['img']; ?>)"></div>
    <div class="container" style="top:85%; height:0px">
        <div class="button-container">
            <img src="d_media/post/<?php echo $row['file']; ?>" alt="Thumbnail Image"width="200px" height="200px" class="img rounded-circle img-raised">
        </div>
    </div>
</div>
<div class="container" style="padding: 10%; z-index:100">
    <div class="row">
        <div class="col-lg-4">
            <div class="" style="padding: 5%; background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="col-md-12">
                    <h4 class="text-center"><b>Detail</b></h4>
                    <br>Gaji <b><?php echo $row['gaji']; ?> Juta</b>
                    <br>Email <b><?php echo $row['email']; ?></b>
                    <br>Nomor Telepon <b><?php echo $row['no_hp']; ?></b>
                    <p>
                        <br>
                    </p>
                    <p style="text-align: center; background-color: red;" class="text-white"><b>Part Time</b></p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row justify-content-md-center">
                <div class="col-md-12 col-lg-12">
                    <h4><b><?php echo $row['judul']; ?></b></h4>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <p class="col-md-3" style="padding-top: 10px;"><i class="fa fa-user"><a href="index.php?mod=profile&act=r&id=<?php echo $row['penulis']; ?>" style="text-decoration: none;"><b></i> <?php echo $row['nm']; ?></p></b></a>
                <p class="col-md-5" style="padding-top: 10px;"><i class="fa fa-hourglass-end">

                </i> Deadline <?php echo $row['w_deadline']; ?></p>
                <p class="col-md-4" style="padding-top: 10px;"><i class="fa fa-map-marker"></i> <?php echo $row['kota_penempatan']; ?></p>
                <div class="col-md-12">
                    <hr>
                    <?php echo html_entity_decode($row['isi']); ?>
                    <br/>
                    <br/>
                    <br/>
                    <p class="pull-left"> <b style="border-left: 2px solid gray; padding-right: 5px; padding-left: 5px;"> <i class="fa fa-tags"></i> </b><?php
                    $a = $row['tag_id'];
                        $arr = explode(",",$a);
                        foreach ($arr as $tag) {
                            $q = "SELECT tag_id,nama FROM tag WHERE tag_id='$tag'";
                            $query = mysqli_query($con, $q);
                            $b = mysqli_fetch_array($query);
                            ?>
                                <a href="index.php?mod=forum&act=g&tag=<?php echo $b['tag_id']; ?>" style="text-decoration:none; background-color:#3498db;padding:3px; color:white;"><?php echo $b['nama']; ?></a>
                                <?php
                        }
                        ?></p>
                </div>
            </div>
          <?php }else { ?>
            <div class="page-header">
                <div class="page-header-image" style="background-image:url(d_media/post/<?php echo $row['img']; ?>)"></div>
                <div class="container" style="top:85%; height:0px">
                    <div class="button-container">
                        <img src="d_media/post/<?php echo $row['file']; ?>" alt="Thumbnail Image"width="200px" height="200px" class="img rounded-circle img-raised">
                    </div>
                </div>
            </div>
            <div class="container" style="padding: 10%">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row justify-content-md-center">
                            <div class="col-md-12 col-lg-12">
                                <h4><b><?php echo $row['judul']; ?></b></h4>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <p class="col-md-3" style="padding-top: 10px;"><i class="fa fa-user"><a href="index.php?mod=profile&act=r&id=<?php echo $row['penulis']; ?>" style="text-decoration: none;"><b></i> <?php echo $row['nm']; ?></p></b></a>
                            <p class="col-md-8" style="padding-top: 10px;"><i class="fa fa-clock-o">

                            </i><?php echo $row['waktu']; ?></p>

                            <div class="col-md-12">
                                <hr>
                                <?php echo html_entity_decode($row['isi']); ?>
                                <br/>
                                <br/>
                                <br/>
                                <p class="pull-left"> <b style="border-left: 2px solid gray; padding-right: 5px; padding-left: 5px;"> <i class="fa fa-tags"></i> </b><?php
                                $a = $row['tag_id'];
                                    $arr = explode(",",$a);
                                    foreach ($arr as $tag) {
                                        $q = "SELECT tag_id,nama FROM tag WHERE tag_id='$tag'";
                                        $query = mysqli_query($con, $q);
                                        $b = mysqli_fetch_array($query);
                                        ?>
                                            <a href="index.php?mod=forum&act=g&tag=<?php echo $b['tag_id']; ?>" style="text-decoration:none; background-color:#3498db;padding:3px; color:white;"><?php echo $b['nama']; ?></a>
                                            <?php
                                    }
                                    ?></p>
                            </div>
                        </div>
          <?php } ?>
            <hr style="border: 0.5px dashed gray;">
            <h3 class="col-lg-12 text-center">Komentar</h3>
            <?php
            $sql    =   "SELECT a.*, b.judul, c.nama FROM komentar a
            INNER JOIN post b ON a.post_id = b.post_id
            INNER JOIN user c ON a.penulis = c.nim
            WHERE a.post_id=$id ORDER BY a.waktu ASC";
                $query  = mysqli_query($con, $sql);
                $no=0;
                while ($rows = mysqli_fetch_array($query))
                { ?>
            <div class="row">
                                <div class="media">
                                    <a class="pull-left" style="padding-right:10px;">
                                        <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 40px; height: 40px;" src="d_media/avatar/default/no-ava.png">
                                    </a>
                                    <div class="media-body">
                                        <div><b>
                                          <a href="index.php?mod=profile&act=r&id=<?php echo $rows['penulis']; ?>" style="text-decoration: none;"><b></i><?php echo $rows['nama']; ?></a></b> <i><?php echo time_elapsed_string($rows['waktu']) ?></i>
                                          <a href="index.php?mod=komentar&act=d&p=<?php echo $row['post_id'] ?>&id=<?php echo $rows['komentar_id'] ?>" onClick="javascript: return confirm('Apakah anda ingin menghapus?');"> <i class="fa fa-trash"></i></a>
                                        </div>
                                        <p><?php echo $rows['isi']; ?></p>
                                    </div>
                                    <hr>
                                </div>
                            </div>
            <?php } if (isset($_SESSION['login'])) { ?>
                            <form method="POST" action="apps/komentar/komentar_i.php">
                                <div class="form-group col-sm-6">

                                    <input type="hidden" class="form-control" name="post_id" value="<?php echo $id ?>">
                                </div>
                                <div class="form-group col-sm-6">

                                    <input type="hidden" class="form-control" name="waktu" value="<?php echo now(); ?>">
                                    <input type="hidden" class="form-control" name="penulis" value="<?php echo $_SESSION['login']; ?>">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-sm-12">
                                    <label>Komentar</label>
                                    <textarea class="form-control" rows="6" name="isi" placeholder="Komentar" required></textarea>
                                </div>
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn btn-default">Kirim</button>
                                </div>
                            </form>
<?php } else { ?>
                            <div class="text-center"><p><b>Anda harus login terlebih dahulu agar bisa berkomentar!</b></p></div>
                        <?php } ?>
        </div>
        <!-- //loop -->
    </div>
    <!-- //endlop -->
</div>
<?php } } ?>
