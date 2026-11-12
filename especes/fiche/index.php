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
            <p class="carte__especes-nom_scientifique"><?php echo $arrListeEspeces['nom_scientifique']; ?></p>

            <figure>
                <img src="<?php echo $niveau ?>assets/images/<?php echo $arrListeEspeces['nom_image']; ?>"
                    alt="Image avec légende">
                <figcaption>
                    <p><?php echo $arrListeEspeces['bas-de-vignette']; ?></p>
                </figcaption>
            </figure>
            <section class="especes-pastilles">
                <div class="pastilles-groupe">
                    <p><strong>Groupe : </strong>
                    <p class="especes-pastille_groupe
                    <?php
                    if ($arrListeEspeces["nom_groupe"] == "Poissons") {
                        echo "groupe-poisson";
                    } else if ($arrListeEspeces["nom_groupe"] == "Mammifères") {
                        echo "groupe-mammifere";
                    } else if ($arrListeEspeces["nom_groupe"] == "Oiseaux ") {
                        echo "groupe-oiseaux";
                    } else if ($arrListeEspeces["nom_groupe"] == "Amphibiens") {
                        echo "groupe-amphibiens";
                    } else if ($arrListeEspeces["nom_groupe"] == "Reptile") {
                        echo "groupe-reptile";
                    }
                    ?>">
                        <?php echo $arrListeEspeces["nom_groupe"]; ?>
                    </p>
                </div>

                <div class="pastilles-statut">
                    <p><strong>Statut : </strong>
                    <p class="especes-pastille_statut
                    <?php
                    if ($arrListeEspeces["statut_LEMV"] == "Menacé") {
                        echo "statut-menace";
                    } else if ($arrListeEspeces["statut_LEMV"] == "Vulnérable") {
                        echo "statut-vulnerable";
                    } ?>">
                        <?php echo $arrListeEspeces["statut_LEMV"]; ?>
                    </p>
                </div>
            </section>

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
        <div class="footer__principal">
            <a class="footer__logo" href="<?php echo $niveau ?>index.php"><img src="<?php echo $niveau ?>assets/sdg/dist/img/QUEBEC_blanc.svg" alt="Accédez à Québec.ca"></a>
            <div class="footer__contenu">

                <nav class="footer__navigation" aria-label="Navigation secondaire">
                    <h2 class="footer__sous-titre">Navigation secondaire</h2>
                    <ul>
                        <li><a href="#">Accessibilité</a></li>
                        <li><a href="#">Conditions d’utilisation</a></li>
                        <li><a href="#">Confidentialité</a></li>
                    </ul>
                </nav>

                <div class="footer__coordonnes">
                    <h2 class="footer__sous-titre">Coordonnées</h2>
                    <div class="footer__adresse">
                        <p>Ministère de l’Environnement, de la Lutte contre les changements climatiques, de la Faune et des Parcs</p>
                        <p>675, boul. René-Lévesque Est</p>
                        <p>Québec (Québec)</p>
                        <p>G1R 5V7</p>
                    </div>
                </div>

                <div class="footer__réseaux">
                    <h2 class="footer__sous-titre">Suivez-nous</h2>
                    <ul class="footer__reseaux-liens">
                        <li><a href="https://www.facebook.com/">Facebook</a></li>
                        <li><a href="https://x.com/">X (Twitter)</a></li>
                        <li><a href="https://www.youtube.com/">YouTube</a></li>
                        <li><a href="https://www.instagram.com/">Instagram</a></li>
                    </ul>
                </div>

            </div>
        </div>

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