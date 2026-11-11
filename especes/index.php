<?php
$niveau = "../";
include($niveau . 'inc/config.inc.php');

if (isset($_GET['id']) == true) {
    $strIdPage = $_GET['id'];
} else {
    $strIdPage = 0;
}

$nbEspecesParPage = 5;
$enregistrementDepart = $strIdPage * $nbEspecesParPage;

$strRequete = 'SELECT COUNT(*) AS nbEnregistrement
               FROM especes';

$pdosCompte = $pdoConnexion->prepare($strRequete);
$pdosCompte->execute();

$ligneCompte = $pdosCompte->fetch();
$nbEnregistrement = $ligneCompte['nbEnregistrement'];
$pdosCompte->closeCursor();

$nbPages = ceil($nbEnregistrement / $nbEspecesParPage);

$strRequete = "SELECT nom_francais, nom_scientifique, nom_image, nom_groupe, statut_LEMV, especes.id, 'est_aire-repartition'
                FROM especes INNER JOIN groupes 
                ON especes.groupe_id = groupes.id 
                INNER JOIN images 
                ON especes.id = images.espece_id
                WHERE `est_aire-repartition` = 0 
                AND images.id != 104
                LIMIT " . $enregistrementDepart . ',' . $nbEspecesParPage;

$pdosResultat = $pdoConnexion->prepare($strRequete);
$pdosResultat->execute();

$arrListeEspeces = array();
$ligne = $pdosResultat->fetch();


for ($cpt = 0; $cpt < $pdosResultat->rowCount(); $cpt++) {
    $arrListeEspeces[$cpt]['nom_francais'] = $ligne['nom_francais'];
    $arrListeEspeces[$cpt]['nom_scientifique'] = $ligne['nom_scientifique'];
    $arrListeEspeces[$cpt]['nom_image'] = $ligne['nom_image'];
    $arrListeEspeces[$cpt]['nom_groupe'] = $ligne['nom_groupe'];
    $arrListeEspeces[$cpt]['statut_LEMV'] = $ligne['statut_LEMV'];
    $arrListeEspeces[$cpt]['id'] = $ligne['id'];
    $arrListeEspeces[$cpt]['est_aire-repartition'] = $ligne['est_aire-repartition'];

    $ligne = $pdosResultat->fetch();

    if ($strIdPage != 0) {
        $strRequete = 'SELECT id, nom
                   FROM artistes
                   INNER JOIN styles_artistes ON artistes.id = styles_artistes.style_id
                   ORDER BY nom ASC
                   LIMIT' . $enregistrementDepart . ',' . $nbEspecesParPage;
    }
}

$pdosResultat->closeCursor();

$strRequete = "SELECT nom_francais, nom_scientifique, nom_image, nom_groupe, statut_LEMV, especes.id, 'est_aire-repartition'
                FROM especes INNER JOIN groupes 
                ON especes.groupe_id = groupes.id 
                INNER JOIN images 
                ON images.espece_id = especes.id
                WHERE `est_aire-repartition` = 0 
                AND images.id != 104";

$pdosResultatEspecesSug = $pdoConnexion->prepare($strRequete);
$pdosResultatEspecesSug->execute();


$arrEspecesSug = array();

for ($CptEnr = 0; $ligneEspecesSug = $pdosResultatEspecesSug->fetch(); $CptEnr++) {
    $arrEspecesSug[$CptEnr]['nom_francais'] = $ligneEspecesSug['nom_francais'];
    $arrEspecesSug[$CptEnr]['nom_scientifique'] = $ligneEspecesSug['nom_scientifique'];
    $arrEspecesSug[$CptEnr]['nom_image'] = $ligneEspecesSug['nom_image'];
    $arrEspecesSug[$CptEnr]['nom_groupe'] = $ligneEspecesSug['nom_groupe'];
    $arrEspecesSug[$CptEnr]['statut_LEMV'] = $ligneEspecesSug['statut_LEMV'];
    $arrEspecesSug[$CptEnr]['id'] = $ligneEspecesSug['id'];
    $arrEspecesSug[$CptEnr]['est_aire-repartition'] = $ligneEspecesSug['est_aire-repartition'];

    $strRequeteEspecesSug = "SELECT nom_francais, nom_scientifique, nom_image, nom_groupe, statut_LEMV, especes.id, 'est_aire-repartition'
                FROM especes INNER JOIN groupes 
                ON especes.groupe_id = groupes.id 
                INNER JOIN images 
                ON images.espece_id = especes.id
                WHERE especes.id = " . $ligneEspecesSug['id'] . "
                AND 'est_aire-repartition' = 0 
                AND images.id != 104";
}

$pdosResultatEspecesSug->closeCursor();

$arrEspecesChoisis = array();
for ($CptEnr = 0; $CptEnr <= 2; $CptEnr++) {
    $especesChoisi = rand(0, count($arrListeEspeces) - 1);

    array_splice($arrEspecesSug, $especesChoisi, 1);
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodiversité - Liste espèces</title>
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

                <form slot="search-zone"
                    method="get"
                    action="https://www.google.ca/search">
                    <qc-search-bar name="q"
                        piv-background=""></qc-search-bar>
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
                    <a class="header__liste-lien" href="<?php echo $niveau ?>especes/fiche/index.php">Fiche espèce</a>
                </li>
                <li class="header__liste-item">
                    <a class="header__liste-lien" href="<?php echo $niveau ?>index.php">Nous contacter</a>
                </li>
            </ul>
        </nav>
    </header>

    <main id="main">
        <div class="qc-container">
            <h1>Liste des espèces</h1>
        </div>

        <ul class="liste__especes">
            <?php
            for ($intCpt = 0; $intCpt < count($arrListeEspeces); $intCpt++) { ?>
                <li class="carte__especes">
                    <figure>
                        <picture class="carte__especes-images">
                            <source
                                srcset="<?php echo $niveau ?>assets/images/<?php echo $arrListeEspeces[$intCpt]["nom_image"]; ?>"
                                media="(min-width:641px)">
                            <img
                                src="<?php echo $niveau ?>assets/images/<?php echo $arrListeEspeces[$intCpt]["nom_image"]; ?>"
                                alt="Image principal">
                        </picture>
                    </figure>
                    <div class="carte__especes-texte">
                        <a class="carte__especes-nom" href="fiche/index.php?id=<?php echo $arrListeEspeces[$intCpt]["id"]; ?>">
                            <?php echo $arrListeEspeces[$intCpt]["nom_francais"]; ?>
                        </a>
                        <p class="carte__especes-nom_scientifique"><?php echo $arrListeEspeces[$intCpt]["nom_scientifique"] ?></p>

                        <div class="carte__especes-pastilles">
                            <p class="carte__especes-pastille_groupe"><?php echo $arrListeEspeces[$intCpt]["nom_groupe"] ?></p>
                            <p class="carte__especes-pastille_statut"><?php echo $arrListeEspeces[$intCpt]["statut_LEMV"] ?></p>
                        </div>
                    </div>

                    <a class="carte__especes-plus" href="fiche/index.php?id=<?php echo $arrListeEspeces[$intCpt]["id"]; ?>">En savoir plus</a>
                </li><br>
            <?php } ?>
        </ul>
        <?php
        if ($strIdPage > 0) { ?>
            <a href="index.php?id=<?php echo $strIdPage - 1; ?>">
                Précédent
            </a>
            <?php
        }

        if ($nbPages > 1) {
            for ($cpt = 0; $cpt < $nbPages; $cpt++) { ?>
                <a href="index.php?id=<?php echo $cpt; ?>">
                    <?php echo $cpt + 1; ?>
                </a>
            <?php
            }
        }

        if ($strIdPage < $nbPages - 1) { ?>
            <a href="index.php?id=<?php echo $strIdPage + 1; ?>">
                Suivant
            </a>
        <?php
        }
        ?>

        <br>
        Page <?php echo $strIdPage + 1; ?> de <?php echo $nbPages; ?>

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
                <a target="_blank"
                    rel="noopener"
                    href="https://www.quebec.ca/droit-auteur">
                    © Gouvernement du Québec, 2026
                </a>
            </qc-external-link>
        </qc-piv-footer>
    </footer>
</body>

</html>