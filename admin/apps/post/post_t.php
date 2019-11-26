<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {
?>
        <div class="cl-mcont">
            <div class="page-head">
                <ol class="breadcrumb">
                    <li><a href="#">The Circle</a></li>
                    <li><a href="?mod=post&act=t">post</a></li>
                    <li class="active">Tampil post</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="pull-right">
                    <span class="spacer">
                        <span class="btn-group">
                            <a href="?mod=post&amp;act=i" class="btn-default btn"><i class="fa fa-pencil-square-o"></i> <i class="fa fa-plus"></i></a>
                        </span>
                    </span>
                </div>
                <div class="header">
                    <h3><i class="fa fa-pencil-square-o nav-icon"></i> post</h3>
                </div>
                <div class="content">
                    <?php
                    $query = $con->prepare("SELECT post_id FROM post");
                    $query->execute();
                    $query->store_result();

                    $tpost = $query->num_rows;

                    if ($tpost > 0) {
                        ?>
                        <div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
                                    <tr>
                                        <th style="width:2%;">No</th>
                                        <th><strong>Judul</strong></th>
                                        <th><strong>Waktu</strong></th>
                                        <th><strong>Image</strong></th>
                                        <th><strong>Forum</strong></th>
                                        <th><strong>Penulis</strong></th>
                                        <th><strong>Tag</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th class="text-center"><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody class="no-border-y">
                                    <tr>
                                        <?php
                                        function check($stat){
                                            if ($stat == 1) {
                                                echo '<i class="fa fa-check"></i>';
                                            } else {
                                                echo '<i class="fa fa-times">';
                                            }
                                        }
                                        $post    =   $con->query('SELECT a.*, b.nama, c.nama as forum
                                        FROM post a INNER JOIN user b
                                        ON b.nim = a.penulis
                                        INNER JOIN forum c
                                        ON a.forum_id = c.forum_id');
                                        $no=0;
                                        foreach ( $post as $row ) {
                                            if($row['status'] == 1){
                                              $status = 'Aktif';
                                              }else{
                                              $status = 'Tidak';
                                              }
                                            ?>
                                            <td><?php echo 1+$no++; ?></td>
                                            <td><?php echo $row['judul']; ?></td>
                                            <td><?php echo $row['waktu']; ?></td>
                                            <td><img src="../d_media/post/<?php echo $row['img']; ?>" alt="Foto" class="rounded" style="width:30px;height:30px;"/></td>
                                            <td><?php echo $row['forum']; ?></td>
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><?php
                                            $a = $row['tag_id'];
                                                $arr = explode(",",$a);
                                                foreach ($arr as $tag) {
                                                    $q = "SELECT nama FROM tag WHERE tag_id='$tag'";
                                                    $query = mysqli_query($con, $q);
                                                    $b = mysqli_fetch_array($query);
                                                        echo $b['nama'].",";
                                                }
                                              ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td class="text-center">
                                              <a class="label label-info" href="?mod=post&amp;act=r&amp;id=<?php echo $row['post_id']; ?>"><i class="fa fa-eye"></i></a>
                                              <a class="label label-default" href="?mod=post&amp;act=e&amp;id=<?php echo $row['post_id']; ?>"><i class="fa fa-pencil"></i></a>
                                              <a class="label label-danger" href="?mod=post&amp;act=d&amp;id=<?php echo $row['post_id']; ?>" onClick="javascript: return confirm('Apakah anda ingin menghapus?');"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
            					Tidak Ada Data
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php
    }

?>
