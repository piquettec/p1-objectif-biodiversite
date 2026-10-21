<?php

/**
 * DÉMO utilisation du Système de Design Gouvernemental
 * 
 * Complet pour Design avec FIGMA : https://design.quebec.ca/design
 * 
 * Partiel pour Intégration : https://github.com/Quebecca/qc_trousse_sdg/
 * Afficher la documentation : /public/html
 * 
 * Les balises <qc-*> sont des composants web de la trousse SDG. Elles sont
 * « réveillées » par le script /assets/sdg/js/qc-sdg.min.js chargé plus bas.
 */

$niveau = "";

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Démo trousse SDG — Cégep</title>

    <!-- Feuille de styles de la trousse (design gouvernemental). -->
    <link rel="stylesheet" href="assets/sdg/dist/css/qc-sdg.min.css">
    <link rel="stylesheet" href="style.css">

    <!-- Script des composants web de la trousse. -->
    <script defer src="assets/sdg/dist/js/qc-sdg.min.js"></script>

</head>

<body>
    <header>
        <div id="pivEnteteExempleRecherchePersonnalisee">
            <qc-piv-header 
                title-text="Accueil"
                title-url="<?php echo $niveau ?>index.php"
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
        </qc-piv-header>
        <nav aria-label="Navigation du haut de page">
            <ul>
                <li><a href="<?php echo $niveau ?>">Accueil</a></li>
                <li><a href="especes/index.php">Liste des espèces</a></li>
                <li><a href="especes/fiche/index.php">Fiche espèce</a></li>
            </ul>
        </nav>
        </div>
    </header>

    <main id="main" class="qc-container">
        <h1 class="qc-h1">Titre de niveau 1</h1>
        <h1 id="exemple-titre-h1"
            class="qc-h1"><span class="qc-subhead ">Surtitre</span>Titre de niveau 1 avec surtitre
        </h1>
        <h2 class="qc-h2">Titre de niveau 2</h2>
        <p class="accent">Un texte en accent et un <span> span. </span>
        </p>
    </main>

    <footer>
        <div class="navigation_footer">
            <a href="/"></a>
        </div>

        <qc-piv-footer logo-src="assets/sdg/dist/img/QUEBEC_couleur.svg"
            logo-src-dark-theme="assets/sdg/dist/img/QUEBEC_blanc.svg">
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