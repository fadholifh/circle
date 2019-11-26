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
                    <li><a href="?mod=user_groupn&act=t">User Group</a></li>
                    <li class="active">Tampil User Group</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="pull-right">
                    <span class="spacer">
                        <span class="btn-group">
                            <a href="?mod=user_group&amp;act=i" class="btn-default btn"><i class="fa fa-users"></i> <i class="fa fa-plus"></i></a>
                        </span>
                    </span>
                </div>
                <div class="header">
                    <h3><i class="fa fa-users nav-icon"></i> User Group</h3>
                </div>
                <div class="content">
                    <?php
                    $query = $con->prepare("SELECT userg_id FROM userg");
                    $query->execute();
                    $query->store_result();

                    $tuser_group = $query->num_rows;

                    if ($tuser_group > 0) {
                        ?>
                        <div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
                                    <tr>
                                        <th style="width:2%;">#</th>
                                        <th><strong>Nama</strong></th>
                                        <th><strong>Forum</strong></th>
                                        <th><strong>Post</strong></th>
                                        <th><strong>Tag</strong></th>
                                        <th><strong>Komentar</strong></th>
                                        <th><strong>Lowker</strong></th>
                                        <th><strong>Pesan</strong></th>
                                        <th><strong>User</strong></th>
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
                                        $userg    =   $con->query('SELECT * FROM userg');
                                        $no=0;
                                        foreach ( $userg as $row ) {
                                            if($row['status'] == 1){
                                              $status = 'Aktif';
                                              }else{
                                              $status = 'Tidak';
                                              }
                                            ?>
                                            <td><?php echo 1+$no++; ?></td>
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><?php echo check($row['forum']); ?></td>
                                            <td><?php echo check($row['post']); ?></td>
                                            <td><?php echo check($row['tag']); ?></td>
                                            <td><?php echo check($row['komentar']); ?></td>
                                            <td><?php echo check($row['lowker']); ?></td>
                                            <td><?php echo check($row['pesan']); ?></td>
                                            <td><?php echo check($row['user']); ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td class="text-center"><a class="label label-default" href="?mod=user_group&amp;act=e&amp;id=<?php echo $row['userg_id']; ?>"><i class="fa fa-pencil"></i></a>
                                                <a class="label label-danger" href="?mod=user_group&amp;act=d&amp;id=<?php echo $row['userg_id']; ?>" onClick="javascript: return confirm('Apakah anda ingin menghapus?');"><i class="fa fa-trash"></i></a></td>
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
