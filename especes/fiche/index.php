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
    <title>Biodiversité - Fiche espèces</title>
    <link rel="stylesheet" href="<?php echo $niveau ?>assets/sdg/dist/css/qc-sdg.min.css">
    <link rel="stylesheet" href="<?php echo $niveau ?>style.css">
    <script defer src="<?php echo $niveau ?>assets/sdg/dist/js/qc-sdg.min.js"></script>
</head>

<body>
    <header>
        <div id="pivEnteteExempleRecherchePersonnalisee">
            <qc-piv-header title-text="Accueil" title-url="<?php echo $niveau ?>index.php"
                alt-logo="Accédez à Québec.ca" logo-url="<?php echo $niveau ?>index.php" enable-search="true"
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
            <h1 class="qc-h1"><span class="qc-subhead ">Fiche</span><?php echo $especes['nom_francais']; ?></h1>
            <figure>
                <img src="<?php echo $niveau ?>assets/images/<?php echo $images['nom_image']; ?>"
                    alt="Image avec légende">
                <figcaption>
                    <p><?php echo $images['bas-de-vignette']; ?></p>
                </figcaption>
            </figure>
            <div class="info-list">
                <p><strong>Nom scientifique : </strong><?php echo $especes['nom_scientifique']; ?></p>
                <p><strong>Statut : </strong><?php echo $especes['statut_LEMV']; ?></p>
            </div>

            <section>
                <h2>Répartition</h2>
                <?php echo $especes['repartition']; ?>
            </section>

            <section>
                <h2>Habitat</h2>
                <?php echo $especes['habitat']; ?>
            </section>

            <section>
                <h2>Alimentation</h2>
                <?php echo $especes['alimentation']; ?>
            </section>

            <section>
                <h2>Reproduction</h2>
                <?php echo $especes['reproduction']; ?>
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
</body>

</html>