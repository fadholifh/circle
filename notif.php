<?php $pen = @$_SESSION['login'];
if (isset($pen)) {
?>
<div id="fixed_button" class="but">
  <div class="but-content">
    <?php
    $pen = @$_SESSION['login'];
    $sql    =   "SELECT a.*, b.nama, b.img FROM notifikasi a INNER JOIN user b ON a.penerima_id = b.nim WHERE penerima_id ='$pen'";
        $query  = mysqli_query($con, $sql);
        $no=0;
        while ($row = mysqli_fetch_array($query))
        {
    ?>
    <div class="row">
        <div class="media" style="padding:10px;">
            <a class="pull-left">
                <img alt="64x64" class="rounded-circle pull-left" style="width: 64px; height: 64px;" src="d_media/avatar/<?php echo $row['img']; ?>">
            </a>
            <div class="media-body" style="padding:5px;">
                <div><i class="pull-left" style="font-size:12px;"><?php echo time_elapsed_string($row['date']); ?></i></div>
                  <?php echo $row['isi']; ?>
                  <hr>
            </div>
        </div>
    </div>
  <?php } ?>
  </div>
  <i class="fa fa-bell" style="padding-top:18px;"></i>
</div>
<div id="fixed_button1" class="but1">
  <div class="but-content1">
    <?php
    $pen = @$_SESSION['login'];
    $sql    =   "SELECT a.*, b.nama, b.img FROM pesan a INNER JOIN user b ON a.pengirim_id = b.nim WHERE penerima_id ='$pen' GROUP BY a.pengirim_id ORDER BY a.waktu DESC";
        $query  = mysqli_query($con, $sql);
        $no=0;
        while ($row = mysqli_fetch_array($query))
        {
    ?>
    <div class="row">
        <div class="media" style="padding:10px;">
            <a class="pull-left">
                <img alt="64x64" class="rounded-circle pull-left" style="width: 32px; height: 32px;" src="d_media/avatar/<?php echo $row['img']; ?>">
            </a>
            <div class="msedia-body" style="padding:5px;">
                <div><i class="pull-left" style="font-size:12px;"><b><?php echo $row['nama']; ?></b> <?php echo time_elapsed_string($row['waktu']); ?></i></div>
            </div>
            <br><?php echo $row['isi']; ?><hr>
        </div>
    </div>
  <?php } ?>
  </div>
  <i class="fa fa-envelope" style="padding-top:18px;"></i>
</div>
<?php } ?>
