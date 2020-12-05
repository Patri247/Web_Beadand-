
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
    <div class="row">
        <div class="col-md-20">
            <div class="card">
                <div class="card-body">
<?php
 $MAPPA = './';
    $TIPUSOK = array ('.jpg', '.png');
    $MEDIATIPUSOK = array('image/jpeg', 'image/png');
    $DATUMFORMA = "Y.m.d. H:i";
    $MAXMERET = 500*1024;
	
	 $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false) {
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK)) {
                $kepek[$fajl] = filemtime($MAPPA.$fajl);
            }
        }
    }
    closedir($olvaso);
	$nez=false;
 $uzenet = array();   
if(isset($_SESSION["csn"])  && isset($_SESSION["un"])  && isset($_SESSION["login"])  )
{
try{
	   $data = $_SESSION;
($_SESSION["csn"]);
($_SESSION["un"]);
($_SESSION["login"]);
$ne=true;
    if (isset($_POST['kuld'])) {
        foreach($_FILES as $fajl) {
            if ($fajl['error'] == 4);   
            elseif (!in_array($fajl['type'], $MEDIATIPUSOK))
                $uzenet[] = " Nem megfelelő típus: " . $fajl['name'];
            elseif ($fajl['error'] == 1   
                        or $fajl['error'] == 2  
                        or $fajl['size'] > $MAXMERET) 
                $uzenet[] = " Túl nagy állomány: " . $fajl['name'];
            else {
                $vegsohely = $MAPPA.strtolower($fajl['name']);
                if (file_exists($vegsohely))
                    $uzenet[] = " Már létezik: " . $fajl['name'];
                else {
                    move_uploaded_file($fajl['tmp_name'], $vegsohely);
                    $uzenet[] = ' Ok: ' . $fajl['name'];
                }
            }
        }        
    }
	}
catch(PDOException $e)
{
	$nez=false;
	?>
	<h3>Nem vagy bejelenkezve</h3><?php
	echo "Hiba: ".$e->getMessage();
}
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Galéria</title>
  
</head>
<body>
    <div id="galeria">
    <h1><strong>Képgaléria</strong></h1><br>

    <?php
    arsort($kepek);
    foreach($kepek as $fajl => $datum)
    {
    ?>
	
        <div class="kep">
            <a href="<?php echo $MAPPA.$fajl ?>">
                <img src="<?php echo $MAPPA.$fajl ?> " class="img-thumbnail">
            </a>   
<div class="desc">			
            <p id="k"><strong>Név:</strong>  <?php echo $fajl; ?></p>
            <p id="k"><strong>Dátum:</strong>  <?php echo date($DATUMFORMA, $datum); ?></p>
			</div>
        </div>
    <?php
    }
    ?>
    </div>
	<br><br>
	   <h1><strong>Feltöltés a galériába:</strong></h1>
	   <br>

<?php

    if (!empty($uzenet))
    {
        echo '<ul>';
        foreach($uzenet as $u)
            echo "<li>$u</li>";
        echo '</ul>';
    }

?>
<?php if($ne==true){ ?>
<h5>Be vagy jelenkezve így tudsz a galériába képet feltölteni.</h5><br>
<?php
}
else
{
?>
<h5>Nem vagy bejenkezve így nem tudsz a galériába képet feltölteni.</h5><br>
<?php }	?>

    <form method="post"
                enctype="multipart/form-data">
				
        <label><strong>Kép:</strong> </label> <input type="file" name="elso" required><br>
       <br>
        <input type="submit" name="kuld" class="button2">
      </form>    

</div>
</div>
</div>
</div>
</div>
</body>
</html>

<?php require_once 'layout/footer.php'; ?>