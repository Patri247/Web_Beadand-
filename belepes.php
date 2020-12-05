<?php session_start(); ?>
<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) { 

try { 
$false++;
$dbh = new PDO('mysql:host=mysql.omega:3306;dbname=patri', 'patri', '8dhj1pK@', // '': jelszó
array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

$sqlSelect = "select id, csaladi_nev, uto_nev from regisztracio where bejelentkezes = :bejelentkezes and jelszo = sha1(:jelszo)";

$sth = $dbh->prepare($sqlSelect);

$sth->execute(array(':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => $_POST['jelszo']));

$row = $sth->fetch(PDO::FETCH_ASSOC);

if($row) {
            $_SESSION['csn'] = $row['csaladi_nev']; $_SESSION['un'] = $row['uto_nev']; $_SESSION['login'] = $_POST['felhasznalo'];
        }
}
catch (PDOException $e) { 
echo "Hiba: ".$e->getMessage();
}
}

?>
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


  <?php

if(isset($_POST['felhasznalo']) && isset($_POST['jelszo']) && isset($_POST['vezeteknev']) && isset($_POST['utonev'])) {

try { 

$dbh = new PDO('mysql:host=mysql.omega:3306;dbname=patri', 'patri', '8dhj1pK@',
array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

$sqlSelect = "select id from regisztracio where bejelentkezes = :bejelentkezes";
$sth = $dbh->prepare($sqlSelect);
$sth->execute(array(':bejelentkezes' => $_POST['felhasznalo']));

if($row = $sth->fetch(PDO::FETCH_ASSOC)) {

$uzenet = "A felhasználói név már foglalt!";
$ujra = "true";
}
else {

$sqlInsert = "insert into regisztracio(id, csaladi_nev, uto_nev, bejelentkezes, jelszo)
values(0, :csaladinev, :utonev, :bejelentkezes, :jelszo)";
- 73 -
$stmt = $dbh->prepare($sqlInsert);
$stmt->execute(array(':csaladinev' => $_POST['vezeteknev'], ':utonev' => $_POST['utonev'],
':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => sha1($_POST['jelszo'])));

if($count = $stmt->rowCount()) {

$newid = $dbh->lastInsertId();
$uzenet = "A regisztrációja sikeres.<br>Azonosítója: {$newid}";
$ujra = false;
}
else {
$uzenet = "A regisztráció nem sikerült.";
$ujra = true;
}
}
}
catch (PDOException $e) { 
echo "Hiba: ".$e->getMessage();
}
}
?>
 <link rel="stylesheet" href="css/style.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body text-center">

     <div class="bej">
	  <p class="inset">   </p> 
                 <form method = "post">

<h1><strong>Bejlentkezés</strong></h1>
<br>

<input type="text" name="felhasznalo" placeholder="felhasználó" required><br><br>
<input type="password" name="jelszo" placeholder="jelszó" required><br><br>

<input type="submit" name="belepes" value="Belépés" class="button2"><br>
<br>&nbsp; 

</form>
 <p class="inset">   </p>
 <?php if(isset($row)) { ?>
<?php if($row) { ?> 

<h1>Bejelentkezett:</h1>

Azonosító: <strong><?= $row['id'] ?></strong><br><br>
Név: <strong><?= $row['csaladi_nev']." ".$row['uto_nev'] ?></strong>
<br>
<br>
<p class="inset"> 
<?php } else { ?> 
<h1>A bejelentkezés nem sikerült!</h1>
<br>
<br>
<p class="inset"> 
<?php } ?>
<?php } ?>
</div>



<div class="card-body">

       </p>  <div class="bej"> <p class="inset"> </p> <h1><strong>Regisztráció</strong></h1><br>
              <form  method = "post">

<input type="text" name="vezeteknev" placeholder="vezetéknév" required><br><br>
<input type="text" name="utonev" placeholder="utónév" required><br><br>
<input type="text" name="felhasznalo" placeholder="felhasználói név" required><br><br>
<input type="password" name="jelszo" placeholder="jelszó" required><br><br>
<input type="submit" name="regisztracio"  class="button2" value="Regisztráció">
<br>&nbsp; 
</form>
 <p class="inset">   </p> 
</div>


             
            </div>
        </div>
    </div>
</div>
</div>

<?php require_once 'layout/footer.php'; ?>