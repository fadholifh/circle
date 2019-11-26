<?php include('theme.php'); 

ptop();
$v  = new DigilibValidasi();
?>
<?php

    $id     = $v->xss($_GET['id']);
    $id     = $v->sql($id);

    $tbp     = new DigilibTable('d_comments');
    $tb     = new DigilibTable('d_page');
    $cpage  = $tb->SelectWhere('page_id',$id,'','');
    $cpage  = $cpage->current();

    $s = $_SESSION['login'];
    $tblu = new DigilibTable("d_users");
    $tblu = $tblu->SelectWhere("session","$s","","");
    $tblu   = $tblu->current();

    //$tb->Custom("UPDATE","SET hit=hit+1 WHERE book_id='".$id."'");
?>

 <div class="container">
        <div class="row col-lg-12">
            <div class="box">
                <hr>
                <h2 class="intro-text text-center"><?php echo $cpage->title?></h2>
                <hr>
                <br>
                    <div class="col-lg-12 text-justify">
                        <div>
                          <p><?php echo htmlspecialchars_decode($cpage->conten)?></p>
                          <hr>
                        </div>
                    </div>
                <div>
                  <h4 class="text-center">Komentar</h4><br>

                  <div class="col-lg-12">
                    <?php
                            $catid   = $tbp->SelectWhereAnd('status','1','page_id',$id);
                            foreach($catid as $sat){
                            $tblpost = new DigilibTable('d_comments');
                            $tblusr = new DigilibTable('d_users');
                            $banyak_post = 0;
                            $banyak_post = $tblpost->GetRow('comments_id',$sat->comments_id);
                            if($sat->user_id > 0){
                                $nama_user = $tblusr->SelectWhere('user_id',$sat->user_id,'','')->current()->fullname;  
                            }else{
                              $nama_user = $sat->author;
                            }
                    ?>
                    <div class="col-lg-12">
                      <div class="col-sm-1"><img class="img-center" src="d_media/avatar/default/medium-no-ava.png" style="width:80px;"></div>
                      <div class="col-sm-11"><h5><?php echo $nama_user?></h5></div>
                        <div class="col-lg-11"><?php echo $sat->conten?></div>
                        <div class="col-lg-11"><i><?php echo time_elapsed_string($sat->date.$sat->time)?></i></div>
                        <br>
                    </div>
                    <?php } ?>
                    <br>
                  </div>


                  <form method="POSt" action="d_proses/komentar/proses.php">
                    <div class="form-group col-lg-6">
                          
                          <input type="hidden" class="form-control" name="author" value="<?php echo $tblu->fullname?>">
                    </div>
                    <div class="form-group col-lg-6">
                          
                          <input type="hidden" class="form-control" name="email" value="<?php echo $tblu->d_email?>">
                          <input type="hidden" class="form-control" name="user_id" value="<?php echo $tblu->user_id?>">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-12">
                          <label>Comments</label>
                          <textarea class="form-control" rows="6" name="conten" required></textarea>
                    </div>
                    <div class="form-group col-lg-12">
                          <input type="hidden" name="page_id" value="<?php echo $id?>">
                          <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                  </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
pbottom();
?>