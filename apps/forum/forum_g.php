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
<div class="container">
<!-- //loop -->
<?php
$q = $_GET['tag'];
  $sql    =   "SELECT a.*, b.tipe, c.nama as forum FROM post a INNER JOIN lowker b ON a.lowker_id = b.lowker_id INNER JOIN forum c ON a.forum_id = c.forum_id WHERE a.status=1 AND a.tag_id LIKE '%$q%' ORDER BY a.waktu DESC";
      $query  = mysqli_query($con, $sql);
      $no=0;
      while ($row = mysqli_fetch_array($query))
      {
        $jml = $query->num_rows;;
        if($jml>0){
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
          <p class="col-md-4" style="padding-top: 10px;"><b><?php echo time_elapsed_string($row['waktu']) ?></b></p>
          <p class="col-md-4" style="padding-top: 10px;"><i class="fa fa-comment-o"></i> <?php echo $com; ?></p>
            <div class="col-md-12">
                <h4><b><a href="index.php?mod=forum&act=det&id=<?php echo $row['post_id'] ?>"><?php echo $row['judul'] ?></a></b></h4>
                <?php echo substr(strip_tags(html_entity_decode($row['isi'])),0,210) ?>. . .
                <br/>
            </div>
            <p class="col-md-4" style="padding-top: 10px;">
              <a href="index.php?mod=forum&act=det&id=<?php echo $row['post_id'] ?>"><i class="fa fa-plus"></i>  Lanjutkan membaca</a></p>

              <p class="col-md-4" style="padding-top: 10px">
                <?php if ($_SESSION['login']==$row['penulis']) { ?>
                <a style="background-color:#f39c12;width:30px;height:30px;padding:2px 10px 2px 10px; color:white;" class="label label-default" href="?mod=post&amp;act=e&amp;id=<?php echo $row['post_id']; ?>"><i class="fa fa-pencil"></i></a>
                <a style="background-color:#c0392b;width:30px;height:30px;padding:2px 10px 2px 10px; color:white;" class="label label-danger" href="?mod=post&amp;act=d&amp;id=<?php echo $row['post_id']; ?>&f=<?php echo $row['forum_id']; ?>" onClick="javascript: return confirm('Apakah anda ingin menghapus?');"><i class="fa fa-trash"></i></a><span class="col-lg-offset-2"></span>
                <?php } ?>
              </p>

              <p class="col-md-4" style="padding-top: 10px">
                <a style="background-color:#3498db;width:30px;height:30px;padding:2px 10px 2px 10px; color:white;" class="label label-default"><b><?php echo $row['forum'] ?></b></a>
              </p>
       </div>
  </div>
<?php }else{ ?>
<div class="col-md-12 col-lg-8 row container">
  <br/>
  <p>Tidak Ada data untuk pencarian <?php echo $q; ?></p>
</div>
<?php }
}?>

</div>
