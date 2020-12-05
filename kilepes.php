<?php require_once 'layout/header.php'; ?>
<?php session_start(); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body text-center">
				
				<?php
$data = $_SESSION;
unset($_SESSION["csn"]);
unset($_SESSION["un"]);
unset($_SESSION["login"]);
?>
 </p>  <div class="bej"> <p class="inset"> </p>
<h1><strong>Kilépett:</strong></h1>
<?= "<strong>".$data['csn']." ".$data['un']."</strong> (".$data['login'].")" ?>
<br>
<br>
<p class="inset"> </p>
</div>
            </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?>