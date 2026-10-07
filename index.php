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
                title-url="index.php"
                alt-logo="Accédez à Québec.ca"
                enable-search="true"
                show-search="true">
                <ul slot="links">
                    <li><a href="#fakeEnglish">English</a>
                    </li>
                    <li><a href="#">Nous joindre</a>
                    </li>
                </ul>

                <nav aria-label="Navigation du haut de page">
                    <ul>
                        <li><a href="<?php echo $niveau ?>">Accueil</a></li>
                        <li><a href="<?php echo $niveau ?>">Liste des espèces</a></li>
                        <li><a href="<?php echo $niveau ?>">Fiche espèce</a></li>
                    </ul>
                </nav>

                <form slot="search-zone"
                    method="get"
                    action="https://www.google.ca/search">
                    <qc-search-bar name="q"
                        piv-background=""></qc-search-bar>
                </form>
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