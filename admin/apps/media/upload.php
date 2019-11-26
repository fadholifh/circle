<?php
session_start();
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {


    $v = new DigilibValidasi();
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $tbmedia = new DigilibTable('d_media');
        $media2 = $tbmedia->SelectLimit('media_id', 'DESC', '0,1');
        $media_id = 1;
        foreach ($media2 as $cat) {
            $media_id = $cat->media_id + 1;

            $extensionList_image = array("jpg", "jpeg", "png");
            $fileName_image = $_FILES['image']['name'];
            $tmpName_image = $_FILES['image']['tmp_name'];
            $fileType = $_FILES['file']['type'];
            $fileSize = $_FILES['file']['size'];
            $pecah_image = explode(".", $fileName_image);
            $seotitle = seo_title($pecah_image[0]);
            $ekstensi_image = @$pecah_image[1];
            $rand_image = rand(1111, 9999);
            $nama_file_unik_image = $rand_image . "-" . $seo . '.' . $ekstensi_image;
            $image = 'image-' . $nama_file_unik_image;
            $tgl = now();
        }

        $tbl = new DigilibTable('d_media');
        $data = array(
            'media_id' => $media_id,
            'name' => $name,
            'image' => $image,
            'type' => $fileType,
            'size' => $fileSize,
            'date' => $tgl
        );
        $tbl->Insert($data);
    }
}
?>

<div class="cl-mcont">
    <div class="page-head">
        <ol class="breadcrumb">
            <li><a href="#">Digilib</a></li>
            <li><a href="?mod=buku&amp;act=t">Buku</a></li>
            <li class="active">Tambah Buku</li>
        </ol>
    </div>
    <div class="block-flat">
        <div class="header">
            <h3><i class="fa fa-book nav-icon"></i> Tambah Buku</h3>
        </div>
        <div class="content">
            <form class="form-horizontal group-border-dashed" style="border-radius: 0px;" role="form" enctype="multipart/form-data" method="post" action="">
<?php
if (isset($msg_error)) {
    ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-times-circle  sign"></i><strong>Error!</strong> <?php echo $msg_error ?>
                    </div>
<?php } ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Cover</label>
                    <div class="col-sm-6">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                            <div>
                                <span class="btn btn-primary btn-file"><span class="fileinput-new">Select File</span><span class="fileinput-exists">Change</span><input type="file" name="image"></span>
                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>

<?php } ?>
