<?php
$niveau = "../../";
include($niveau . 'inc/config.inc.php');

$idEspeces = $_GET['id'];

$strRequete = "SELECT nom_francais, nom_scientifique, nom_image, nom_groupe, statut_LEMV, especes.id, habitat, alimentation, reproduction, repartition, `bas-de-vignette`
                FROM especes INNER JOIN groupes 
                ON especes.groupe_id = groupes.id 
                INNER JOIN images 
                ON especes.id = images.espece_id
                WHERE especes.id=" . $idEspeces;

$pdosResultat = $pdoConnexion->prepare($strRequete);
$pdosResultat->execute();

$arrListeEspeces = array();
$ligne = $pdosResultat->fetch();

$arrListeEspeces['nom_francais'] = $ligne['nom_francais'];
$arrListeEspeces['nom_scientifique'] = $ligne['nom_scientifique'];
$arrListeEspeces['nom_image'] = $ligne['nom_image'];
$arrListeEspeces['nom_groupe'] = $ligne['nom_groupe'];
$arrListeEspeces['statut_LEMV'] = $ligne['statut_LEMV'];
$arrListeEspeces['habitat'] = $ligne['habitat'];
$arrListeEspeces['alimentation'] = $ligne['alimentation'];
$arrListeEspeces['reproduction'] = $ligne['reproduction'];
$arrListeEspeces['repartition'] = $ligne['repartition'];
$arrListeEspeces['bas-de-vignette'] = $ligne['bas-de-vignette'];

$pdosResultat->closeCursor();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodiversité - Fiche espèces</title>
    <link rel="stylesheet" href="<?php echo $niveau ?>assets/sdg/dist/css/qc-sdg.min.css">
    <link rel="stylesheet" href="<?php echo $niveau ?>style.css">
    <script defer src="<?php echo $niveau ?>assets/sdg/dist/js/qc-sdg.min.js"></script>
</head>

<body>
    <header>
        <div id="pivEnteteExempleRecherchePersonnalisee">
            <qc-piv-header
                alt-logo="Accédez à Québec.ca"
                logo-url="<?php echo $niveau ?>index.php"
                enable-search="true"
                show-search="false">
                <ul slot="links">
                    <li><a href="#fakeEnglish">English</a>
                    </li>
                    <li><a href="#">Nous joindre</a>
                    </li>
                </ul>



                <form slot="search-zone" method="get" action="https://www.google.ca/search">
                    <qc-search-bar name="q" piv-background=""></qc-search-bar>
                </form>
            </qc-piv-header>
        </div>
        <nav class="header__nav">
            <ul class="header__liste">
                <li class="header__liste-item">
                    <a class="header__liste-lien" href="<?php echo $niveau ?>index.php">Accueil</a>
                </li>
                <li class="header__liste-item">
                    <a class="header__liste-lien" href="<?php echo $niveau ?>especes/index.php">Liste des espèces</a>
                </li>
                <li class="header__liste-item">
                    <a class="header__liste-lien" href="<?php echo $niveau ?>index.php">À propos</a>
                </li>
                <li class="header__liste-item">
                    <a class="header__liste-lien" href="<?php echo $niveau ?>index.php">Nous contacter</a>
                </li>
            </ul>
        </nav>
    </header>

    <main id="main">
        <div class="qc-container">
            <h1 class="qc-h1"><span class="qc-subhead ">Fiche</span><?php echo $arrListeEspeces['nom_francais']; ?></h1>
            <figure>
                <img src="<?php echo $niveau ?>assets/images/<?php echo $arrListeEspeces['nom_image']; ?>"
                    alt="Image avec légende">
                <figcaption>
                    <p><?php echo $arrListeEspeces['bas-de-vignette']; ?></p>
                </figcaption>
            </figure>
            <div class="info-list">
                <p><strong>Nom scientifique : </strong><?php echo $arrListeEspeces['nom_scientifique']; ?></p>
                <p><strong>Statut : </strong>
                <p class="carte__especes-pastille_groupe"><?php echo $arrListeEspeces['statut_LEMV']; ?></p>
                </p>
                <p><strong>Groupe : </strong>
                <p class="carte__especes-pastille_groupe"><?php echo $arrListeEspeces['nom_groupe']; ?></p>
                </p>
            </div>

            <section>
                <h2>Répartition</h2>
                <?php echo $arrListeEspeces['repartition']; ?>
            </section>

            <section>
                <h2>Habitat</h2>
                <?php echo $arrListeEspeces['habitat']; ?>
            </section>

            <section>
                <h2>Alimentation</h2>
                <?php echo $arrListeEspeces['alimentation']; ?>
            </section>

            <section>
                <h2>Reproduction</h2>
                <?php echo $arrListeEspeces['reproduction']; ?>
            </section>
        </div>
    </main>

    <footer>
        <qc-piv-footer logo-src="<?php echo $niveau ?>assets/sdg/dist/img/QUEBEC_couleur.svg"
            logo-src-dark-theme="<?php echo $niveau ?>assets/sdg/dist/img/QUEBEC_blanc.svg">
            <nav aria-label="Navigation du pied de page">
                <ul>
                    <li><a href="/">Accessibilité</a></li>
                    <li><a href="/">Plan du site</a></li>
                    <li><a href="/">Accès à l’information</a></li>
                    <li><a href="/">Politique de confidentialité</a></li>
                    <li><a href="/">Conditions d'utilisation</a></li>
                    <li><a href="/">À propos de Québec.ca</a></li>
                </ul>
            </nav>
            <qc-external-link slot="copyright">
                <a target="_blank" rel="noopener" href="https://www.quebec.ca/droit-auteur">
                    © Gouvernement du Québec, 2026
                </a>
            </qc-external-link>
        </qc-piv-footer>
    </footer>
</body>

</html>