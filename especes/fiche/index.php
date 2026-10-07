<?php 
/**
 * DÉMO utilisation du Système de Design Gouvernemental
 * 
 **/
$niveau = "../../";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Démo trousse SDG — Cégep</title>

    <!-- Feuille de styles de la trousse (design gouvernemental). -->
    <link rel="stylesheet" href="<?php echo $niveau ?>assets/sdg/dist/css/qc-sdg.min.css">

    <!-- Script des composants web de la trousse. -->
    <script defer src="<?php echo $niveau ?>assets/sdg/dist/js/qc-sdg.min.js"></script>
</head>
<body>
<header>
    <div id="pivEnteteExempleRecherchePersonnalisee">
            <qc-piv-header
                title-url="<?php echo $niveau ?>index.php"
                alt-logo="Accédez à Québec.ca"
                enable-search="true"
                show-search="true"> 
                <ul slot="links">
                    <li><a href="#fakeEnglish">English</a>
                    </li>
                    <li><a href="#">Nous joindre</a>
                    </li>
                </ul>



                <form slot="search-zone"
                    method="get"
                    action="https://www.google.ca/search">
                    <qc-search-bar name="q"
                        piv-background=""></qc-search-bar>
                </form>
            </qc-piv-header>
            <nav aria-label="Navigation du haut de page">
                    <ul>
                        <li><a href="<?php echo $niveau ?>index.php">Accueil</a></li>
                        <li><a href="../index.php">Liste des espèces</a></li>
                        <li><a href="index.php">Fiche espèce</a></li>
                    </ul>
                </nav>
        </div>
</header>

<main id="main">
    <div class="qc-container"> 
        <h1 class="qc-h1"><span class="qc-subhead ">Fiche</span>Faucon pélerin</h1>
        <figure>
  <img src="<?php echo $niveau ?>assets/images/IMG_Faucon-pelerin_JeanLapointe.jpg"
       alt="Image avec légende">
  <figcaption>
    <p>Faucon pélerin<br>
      <em>Photo: Jean Lapointe</em>
    </p>
  </figcaption>
</figure>
 
    </div>
</main>

<footer>
    <qc-piv-footer>
        <nav aria-label="Navigation du pied de page">
            <ul>
                <li><a href="<?php echo $niveau ?>">Accueil</a></li>
                <li><a href="https://design.quebec.ca" target="_blank" rel="noopener">Système de design gouvernemental</a></li>
            </ul>
        </nav>
    </qc-piv-footer>
</footer>
</body>
</html>