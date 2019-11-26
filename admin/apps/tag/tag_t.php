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
                    <li><a href="?mod=tag&act=t">Tag</a></li>
                    <li class="active">Tampil Tag</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="pull-right">
                    <span class="spacer">
                        <span class="btn-group">
                            <a href="?mod=tag&amp;act=i" class="btn-default btn"><i class="fa fa-tags"></i> <i class="fa fa-plus"></i></a>
                        </span>
                    </span>
                </div>
                <div class="header">
                    <h3><i class="fa fa-tags nav-icon"></i> Tag</h3>
                </div>
                <div class="content">
                    <?php
                    $query = $con->prepare("SELECT tag_id FROM tag");
                    $query->execute();
                    $query->store_result();

                    $ttag = $query->num_rows;

                    if ($ttag > 0) {
                        ?>
                        <div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
                                    <tr>
                                        <th style="width:2%;">#</th>
                                        <th><strong>Nama</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th class="text-center"><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody class="no-border-y">
                                    <tr>
                                        <?php

                                        $sql    =   'SELECT * FROM tag WHERE status=1';
                                        $query  = mysqli_query($con, $sql);
                                        $no=0;
                                        while ($row = mysqli_fetch_array($query))
                                        {
                                            if($row['status'] == 1){
                                              $status = 'Aktif';
                                              }else{
                                              $status = 'Tidak';
                                              }
                                            ?>
                                            <td><?php echo 1+$no++; ?></td>
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td class="text-center">
                                                <a class="label label-info" href="?mod=tag&amp;act=r&amp;id=<?php echo $row['tag_id']; ?>"><i class="fa fa-eye"></i></a>

                                                <a class="label label-default" href="?mod=tag&amp;act=e&amp;id=<?php echo $row['tag_id']; ?>"><i class="fa fa-pencil"></i></a>
                                                <a class="label label-danger" href="?mod=tag&amp;act=d&amp;id=<?php echo $row['tag_id']; ?>" onClick="javascript: return confirm('Apakah anda ingin menghapus?');"><i class="fa fa-trash"></i></a></td>
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
