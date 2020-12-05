
<?php session_start(); ?>

<html >
<head>
      <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   
   <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/css/splide.min.css">
	    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark mb-5">
     
     
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
			
                <li class="nav-item active">
                    <a class="nav-link" id="t" href="fooldal">Főoldal <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="t" href="rolunk">Rólunk</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" id="t" href="kepgaleria">Képgaléria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="t" href="kapcsolat">Kapcsolat</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" id="t" href="tartalom">Tartalom</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link"  id="t" href="emailek">E-mailek</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" id="t" href="belepes">Belépés</a>
                </li>
			
				<li class="nav-item">
                    <a class="nav-link" id="t" href="kilepes">Kilépés</a>
                </li>
			
            </ul>
	
          				<?php $data = $_SESSION;
($_SESSION["csn"]);
($_SESSION["un"]);
($_SESSION["login"])?>
			
                 <h4> Bejelentkezett: <?= $data['csn']." ".$data['un']." (".$data['login'].")" ?></h4>
         
        </div>
    </nav>

</body>
</html>


