<?php session_start(); ?>
<?php $data = $_SESSION;
($_SESSION["csn"]);
($_SESSION["un"]);
($_SESSION["login"]);
if(isset($_SESSION["csn"])  && isset($_SESSION["un"])  && isset($_SESSION["login"])  )
{
	require_once 'layout/header2.php';
}
else
{
	require_once 'layout/header.php';
}

?>
 <link rel="stylesheet" href="css/style.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body text-center">
				
<table id="tabli" class="table table-bordered" >
<thead>
<tr><th>Id</th><th>Címzett</th><th>Tárgy</th><th>Üzenet</th></tr></thead>
<?php

try{
$pdo = new PDO('mysql:host=mysql.omega:3306;dbname=patri', 'patri', '8dhj1pK@',
array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$pdo->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
$utasitas = "Select * From email Order By datum DESC";
$eredm = $pdo->query($utasitas);

foreach ($eredm as $sor)
print "<tr><td>".$sor['id'] . "</td>"."<td> " .$sor['cimzett']. "</td>"."<td> " .$sor['targy']."</td>"."<td> ".$sor['uzenet'] . "</td>"."</tr> ";
}

catch(PDOException $e) {
echo "Hiba: ".$e->getMessage();
}


?>
</table>

 </div>
             
            </div>
        </div>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?>