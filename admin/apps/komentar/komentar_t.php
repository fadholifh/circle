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
                    <li><a href="?mod=komentar&act=t">komentar</a></li>
                    <li class="active">Tampil komentar</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="pull-right">
                    <span class="spacer">
                        <span class="btn-group">
                            <a href="?mod=komentar&amp;act=i" class="btn-default btn"><i class="fa fa-comment-o"></i> <i class="fa fa-plus"></i></a>
                        </span>
                    </span>
                </div>
                <div class="header">
                    <h3><i class="fa fa-comment-o nav-icon"></i> komentar</h3>
                </div>
                <div class="content">
                    <?php
                    $query = $con->prepare("SELECT komentar_id FROM komentar");
                    $query->execute();
                    $query->store_result();

                    $tkomentar = $query->num_rows;

                    if ($tkomentar > 0) {
                        ?>
                        <div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
                                    <tr>
                                        <th style="width:2%;">#</th>
                                        <th><strong>Komentar pada</strong></th>
                                        <th><strong>Isi</strong></th>
                                        <th><strong>Waktu</strong></th>
                                        <th><strong>Pengomentar</strong></th>
                                        <th><strong>Jenis</strong></th>
                                        <th class="text-center"><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody class="no-border-y">
                                    <tr>
                                        <?php

                                        $komentar    =   $con->query('SELECT komentar.komentar_id, post.judul, komentar.isi, komentar.waktu, user.nama, komentar.status
                                        FROM komentar
                                        INNER JOIN post
                                        ON komentar.post_id=post.post_id
                                        INNER JOIN user
                                        ON komentar.penulis = user.nim');
                                        $no=0;
                                        foreach ( $komentar as $row ) {
                                            if($row['status'] == 1){
                                              $status = 'Aktif';
                                              }else{
                                              $status = 'Tidak';
                                              }
                                            ?>
                                            <td><?php echo 1+$no++; ?></td>
                                            <td><?php echo $row['judul']; ?></td>
                                            <td><?php echo $row['isi']; ?></td>
                                            <td><?php echo $row['waktu']; ?></td>
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td class="text-center">
                                                <a class="label label-info" href="?mod=komentar&amp;act=r&amp;id=<?php echo $row['komentar_id']; ?>"><i class="fa fa-eye"></i></a>
                                                <a class="label label-default" href="?mod=komentar&amp;act=e&amp;id=<?php echo $row['komentar_id']; ?>"><i class="fa fa-pencil"></i></a>
                                                <a class="label label-danger" href="?mod=komentar&amp;act=d&amp;id=<?php echo $row['komentar_id']; ?>" onClick="javascript: return confirm('Apakah anda ingin menghapus?');"><i class="fa fa-trash"></i></a></td>
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
