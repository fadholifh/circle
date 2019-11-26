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
                    <li><a href="?mod=lowker&act=t"> Tampil Lowker</a></li>
                    <li class="active">Tampil lowker</li>
                </ol>
            </div>
            <div class="block-flat">
                <div class="pull-right">
                    <span class="spacer">
                        <span class="btn-group">
                            <a href="?mod=lowker&amp;act=i" class="btn-default btn"><i class="fa fa-sitemap"></i> <i class="fa fa-plus"></i></a>
                        </span>
                    </span>
                </div>
                <div class="header">
                    <h3><i class="fa fa-tags fa-sitemap"></i> Tampil Lowker</h3>
                </div>
                <div class="content">
                    <?php
                    $query = $con->prepare("SELECT lowker_id FROM lowker");
                    $query->execute();
                    $query->store_result();

                    $tlowker = $query->num_rows;

                    if ($tlowker > 0) {
                        ?>
                        <div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
                                    <tr>
                                        <th style="width:2%;">#</th>
                                        <th><strong>Jenis</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th class="text-center"><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody class="no-border-y">
                                    <tr>
                                        <?php

                                        $sql    =   'SELECT * FROM lowker';
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
                                            <td><?php echo $row['tipe']; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td class="text-center">
                                                <a class="label label-info" href="?mod=lowker&amp;act=r&amp;id=<?php echo $row['lowker_id']; ?>"><i class="fa fa-eye"></i></a>
                                            <a class="label label-default" href="?mod=lowker&amp;act=e&amp;id=<?php echo $row['lowker_id']; ?>"><i class="fa fa-pencil"></i></a>
                                            <a class="label label-danger" href="?mod=lowker&amp;act=d&amp;id=<?php echo $row['lowker_id']; ?>" onClick="javascript: return confirm('Apakah anda ingin menghapus?');"><i class="fa fa-trash"></i></a></td>
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
