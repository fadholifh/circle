<div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" data-parallax="true" style="background-image: url('./assets/img/header.jpg');">
    </div>
    <div class="container">
        <div class="content-center brand">
            <img class="n-logo" src="./assets/img/now-logo.png" alt="">
            <h1 class="h1-seo">The Circle</h1>
            <h3>Connecting Alumni</h3>
        </div>
    </div>
</div>
<div class="main">
    <div class="section section-images">
        <div class="container">
            <div class="row" id="forum">
                <div class="col-md-12"><br/><br/>
									<div class="section">
		                <div class="container text-center">
		                    <div class="row justify-content-md-center">
		                        <div class="col-md-12 col-lg-8">
		                            <h2 class="title">Forum</h2>
                                <div class="row">
                                <?php
                                $sql    =   'SELECT * FROM forum WHERE status=1';
                                $query  = mysqli_query($con, $sql);
                                $no=0;
                                while ($row = mysqli_fetch_array($query))
                                {?>
		                            <div class="col-md-6">
																	<div class="team-player border border-secondary">
																		<br/>
		                                <img width="50%" src="assets/img/default-avatar.png" alt="Thumbnail Image" class="rounded-circle img-fluid img-raised">
		                                <h4 class="title"><?php echo $row['nama']; ?></h4>
		                                <a href="index.php?mod=forum&act=t&id=<?php echo $row['forum_id']; ?>" class="btn btn-primary btn-round">Masuk</a>
		                              </div>
																</div>
                                <?php } ?>
		                        </div>
                          </div>
		                    </div>
		                </div>
		            </div>
                </div>
            </div>
        </div>
    </div>
</div>
