<div class="p">
<?php

// Ha letezik a page parameter
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'fooldal';
}

// Megnezzuk a $page valtozo mit tartalmaz es annak fuggvenyeben kiszolgaljuk az oldalt
switch ($page) {
    case "fooldal":
        $pageTitle = 'Kezdőoldal';      // A lap cime <title></title>
        $requestedPage = 'fooldal.php';    // A szukseges fajl amit a felhasznalo fele kiteszunk
        break;
    case "rolunk":
        $pageTitle = 'Rólunk';
        $requestedPage = 'rolunk.php';
        break;
    case "kepgaleria":
        $pageTitle = 'Képgaléria';
        $requestedPage = 'kepgaleria.php';
        break;
		case "kapcsolat":
        $pageTitle = 'Kapcsolat Űrlap';
        $requestedPage = 'kapcsolat.php';
        break;
		case "belepes":
        $pageTitle = 'Belépés';
        $requestedPage = 'belepes.php';
        break;
		case "emailek":
        $pageTitle = 'Emailek';
        $requestedPage = 'emailek.php';
        break;
		case "kilepes":
        $pageTitle = 'Kilépés';
        $requestedPage = 'kilepes.php';
        break;
		case "regisztracio":
        $pageTitle = 'Regisztráció';
        $requestedPage = 'regisztracio.php';
        break;
		break;
		case "tartalom":
        $pageTitle = 'Tartalom';
        $requestedPage = 'tartalom.php';
        break;
    default:
        $pageTitle = '404 Hiba';
        $requestedPage = '404.php';
	

}

// Ha a kert fajl letezik, akkor betoltjuk..., ha nem, akkor 404 oldal
if (file_exists(__DIR__ . '/pages/' . $requestedPage))
    require_once(__DIR__ . '/pages/' . $requestedPage);
else
    require_once(__DIR__ . '/pages/404.php');
?></div>