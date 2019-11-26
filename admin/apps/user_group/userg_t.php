<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {

$v 	= new DigilibValidasi();
	$tb 	= new DigilibTable('d_user_group');
	$luser_group	= $tb->Select('user_group_id','ASC');
	$no = 1;
?>
<div class="cl-mcont">
	<div class="page-head">
		<ol class="breadcrumb">
			<li><a href="#">Digilib</a></li>
			<li><a href="?mod=user_group&act=t">User Group</a></li>
			<li class="active">Tampil User Group</li>
		</ol>
	</div>
		<div class="block-flat">
			<div class="pull-right"><a href="?mod=user_group&amp;act=i"><h4><i class="fa fa-plus">  <span>User Group</span> </i></h4></a></div>
			<div class="header">
				<h3><i class="fa fa-building-o nav-icon"></i> User Group</h3>
			</div>
			<div class="content">
				<div class="table-responsive">
					<table class="table no-border hover">
						<thead class="no-border">
							<tr>
								<th style="width:2%;">#</th>
								<th><strong>Nama</strong></th>
								<th><strong>Status</strong></th>
								<th><strong>Halaman</strong></th>
								<th><strong>Berita</strong></th>
								<th><strong>Buku</strong></th>
								<th><strong>Kategori</strong></th>
								<th><strong>Komentar</strong></th>
								<th><strong>Penerbit</strong></th>
								<th><strong>User</strong></th>
								<th><strong>User Group</strong></th>
								<th><strong>Tag</strong></th>
								<th class="text-center"><strong>Action</strong></th>
							</tr>
						</thead>
						<tbody class="no-border-y">
							<tr>
								<?php
									foreach($luser_group as $cat){
										$tblpost = new DigilibTable('d_user_group');
										$banyak_post = 0;
										$banyak_post = $tblpost->GetRow('user_group_id',$cat->user_group_id);
									if($cat->status == 1){
											$status = 'Aktif';
										}else{
											$status = 'Tidak';
										}
									if($cat->comments == 1){
											$comments = 'Ijinkan';
										}else{
											$comments = 'Tidak';
										}
									if($cat->page == 1){
											$page = 'Ijinkan';
										}else{
											$page = 'Tidak';
										}
									if($cat->news == 1){
											$news = 'Ijinkan';
										}else{
											$news = 'Tidak';
										}
									if($cat->book == 1){
											$book = 'Ijinkan';
										}else{
											$book = 'Tidak';
										}
									if($cat->category == 1){
											$category = 'Ijinkan';
										}else{
											$category = 'Tidak';
										}
									if($cat->publisher == 1){
											$publisher = 'Ijinkan';
										}else{
											$publisher = 'Tidak';
										}
									if($cat->users == 1){
											$users = 'Ijinkan';
										}else{
											$users = 'Tidak';
										}
									if($cat->user_group == 1){
											$user_group = 'Ijinkan';
										}else{
											$user_group = 'Tidak';
										}
									if($cat->tag == 1){
											$tag = 'Ijinkan';
										}else{
											$tag = 'Tidak';
										}
								?>
								<td><?php echo $no?></td>
								<td><?php echo $cat->title?></td>
								<td><?php echo $status?></td>
								<td><?php echo $page?></td>
								<td><?php echo $news?></td>
								<td><?php echo $book?></td>
								<td><?php echo $category?></td>
								<td><?php echo $comments?></td>
								<td><?php echo $publisher?></td>
								<td><?php echo $users?></td>
								<td><?php echo $user_group?></td>
								<td><?php echo $tag?></td>
								<td class="text-center"><a class="label label-default" href="?mod=user_group&amp;act=e&amp;id=<?php echo $cat->user_group_id?>"><i class="fa fa-pencil"></i></a>
														<a class="label label-danger" href="?mod=user_group&amp;act=d&amp;id=<?php echo $cat->user_group_id?>"><i class="fa fa-times"></i></a></td>
							</tr>
							<?php
								$no++;
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			</div>
		</div>
<?php }
?>
