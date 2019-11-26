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
                    <li><a href="?mod=user&act=t">User Group</a></li>
                    <li class="active">Tampil User Group</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="pull-right">
                    <span class="spacer">
                        <span class="btn-group">
                            <a href="?mod=user&amp;act=i" class="btn-default btn"><i class="fa fa-user"></i> <i class="fa fa-plus"></i></a>
                        </span>
                    </span>
                </div>
                <div class="header">
                    <h3><i class="fa fa-user nav-icon"></i> user</h3>
                </div>
                <div class="content">
                    <?php
                    $query = $con->prepare("SELECT nim FROM user");
                    $query->execute();
                    $query->store_result();

                    $tuser = $query->num_rows;

                    if ($tuser > 0) {
                        ?>
                        <div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
                                    <tr>
                                        <th style="width:2%;">NIM</th>
                                        <th><strong>Email</strong></th>
                                        <th><strong>Nama</strong></th>
                                        <th><strong>Profile</strong></th>
                                        <th><strong>No HP</strong></th>
                                        <th><strong>Mendaftar</strong></th>
                                        <th><strong>Level</strong></th>
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
                                        $user    =   $con->query('SELECT a.*, b.nama as level FROM user a INNER JOIN userg b ON b.userg_id = a.userg_id');
                                        $no=0;
                                        foreach ( $user as $row ) {
                                            if($row['status'] == 1){
                                              $status = 'Aktif';
                                              }else{
                                              $status = 'Tidak';
                                              }
                                            ?>
                                            <td><?php echo $row['nim']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><img src="../d_media/avatar/<?php echo $row['img']; ?>" alt="Foto" class="rounded" style="width:30px;height:30px;"/></td>
                                            <td><?php echo $row['no_hp']; ?></td>
                                            <td><?php echo $row['registered']; ?></td>
                                            <td><?php echo $row['level']; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td class="text-center">


                                                <a class="label label-info" href="?mod=user&amp;act=r&amp;id=<?php echo $row['nim']; ?>"><i class="fa fa-eye"></i></a>

                                                <a class="label label-default" href="?mod=user&amp;act=e&amp;id=<?php echo $row['nim']; ?>"><i class="fa fa-pencil"></i></a>
                                                <a class="label label-danger" href="?mod=user&amp;act=d&amp;id=<?php echo $row['nim']; ?>" onClick="javascript: return confirm('Apakah anda ingin menghapus?');"><i class="fa fa-trash"></i></a></td>
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
