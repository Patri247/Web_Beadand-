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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center" name="elso">
              
					</div>
					
                   <form method=post>
				   <table border=1 align=center>
			<tr><td><center><img  src="level.png" width=500 height=400></center</td></tr>
				<tr><td>  <input class="long" align=left type=text name=cimzett placeholder="Címzett" required></td></tr>
				<tr><td>  <input  class="long" align=left type=text name=targy placeholder="Tárgy" required></td></tr>
				 
				 <tr><td> <textarea rows="10" cols="125" name=uzenet placeholder="Üzenet..."></textarea></td></tr>
				
				    </table> <br><input type=submit class="button" name=gomb value="Küldés" align="right" ><br>
				
				  </form>

                 <?php

if(isset($_POST['cimzett']) && isset($_POST['targy']) && isset($_POST['uzenet'])) {

try{
$datum=date("Y-m-d");

$dbh = new PDO('mysql:host=mysql.omega:3306;dbname=patri', 'patri', '8dhj1pK@',
array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

$sqlInsert = "insert into email(id, cimzett, targy, uzenet, datum)
values(0, :cimzett, :targy, :uzenet, :datum)";


$stmt = $dbh->prepare($sqlInsert);
$stmt->execute(array(':cimzett' => $_POST['cimzett'], ':targy' => $_POST['targy'],
':uzenet' => $_POST['uzenet'], ':datum' => $datum));

}
catch(PDOException $e)
{
	
	echo "Hiba: ".$e->getMessage();
	
}
}
?>


            </div>
        </div>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?>