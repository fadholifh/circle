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
                    <li><a href="?mod=pesan&act=t">pesan</a></li>
                    <li class="active">Tampil pesan</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="pull-right">
                    <span class="spacer">
                        <span class="btn-group">
                            <a href="?mod=pesan&amp;act=i" class="btn-default btn"><i class="fa fa-envelope"></i> <i class="fa fa-plus"></i></a>
                        </span>
                    </span>
                </div>
                <div class="header">
                    <h3><i class="fa fa-envelope nav-icon"></i> pesan</h3>
                </div>
                <div class="content">
                    <?php
                    $query = $con->prepare("SELECT pesan_id FROM pesan");
                    $query->execute();
                    $query->store_result();

                    $tpesan = $query->num_rows;

                    if ($tpesan > 0) {
                        ?>
                        <div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
                                    <tr>
                                        <th style="width:2%;">#</th>
                                        <th><strong>Pengirim</strong></th>
                                        <th><strong>Penerima</strong></th>
                                        <th><strong>Waktu</strong></th>
                                        <th><strong>Isi</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th class="text-center"><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody class="no-border-y">
                                    <tr>
                                        <?php

                                        $pesan    =   $con->query('SELECT pesan.pesan_id, pesan.pengirim_id, pesan.isi, pesan.waktu, user.nama as penerima, pesan.status
                                        FROM pesan
                                        INNER JOIN user
                                        ON pesan.penerima_id = user.nim ');
                                        $no=0;
                                        foreach ( $pesan as $row ) {
                                            if($row['status'] == 1){
                                              $status = 'Aktif';
                                              }else{
                                              $status = 'Tidak';
                                              }
                                            ?>
                                            <td><?php echo 1+$no++; ?></td>
                                            <td><?php echo $row['pengirim_id']; ?></td>
                                            <td><?php echo $row['penerima']; ?></td>
                                            <td><?php echo $row['waktu']; ?></td>
                                            <td><?php echo MD5($row['isi']); ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td class="text-center">
                                                <a class="label label-info" href="?mod=pesan&amp;act=r&amp;id=<?php echo $row['pesan_id']; ?>"><i class="fa fa-eye"></i></a>                                        
                                                <a class="label label-default" href="?mod=pesan&amp;act=e&amp;id=<?php echo $row['pesan_id']; ?>"><i class="fa fa-pencil"></i></a>
                                                <a class="label label-danger" href="?mod=pesan&amp;act=d&amp;id=<?php echo $row['pesan_id']; ?>" onClick="javascript: return confirm('Apakah anda ingin menghapus?');"><i class="fa fa-trash"></i></a></td>
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
