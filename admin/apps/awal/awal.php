<?php
if (!isset($_SESSION['login'])) {
    echo '403';
    Redir('403.html');
} else {
 ?>
<div class="cl-mcont">
    <div class="row">
Selemat datang admin
</div>
</div>
<?php } ?>
