<?php
$niveau = "";
include($niveau . 'inc/config.inc.php');
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


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodiversité</title>
    <link rel="stylesheet" href="assets/sdg/dist/css/qc-sdg.min.css">
    <link rel="stylesheet" href="<?php echo $niveau ?>style.css">
    <script defer src="assets/sdg/dist/js/qc-sdg.min.js"></script>

</head>

<body>
    <header>
        <div id="pivEnteteExempleRecherchePersonnalisee">
            <qc-piv-header alt-logo="Accédez à Québec.ca" logo-url="<?php echo $niveau ?>index.php" enable-search="true"
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

        <figure class="image__header">
            <img src="assets/image_exp/Aigle_heros2x.png" alt="Aigle - Image principale">
            <div class="image__contenu-superpose">
                <h1 class="qc-h1">Découvrir. Comprendre. Protéger.</h1>
                <a href="especes/index.php" class="qc-btn qc-btn-primary">Découvrir les espèces &rarr;</a>
            </div>
        </figure>
    </header>

    <main id="main" class="qc-container">

        <h2 class="qc-h2">Actualité</h2>
        </p>

        <!-- Section Actualité -->
        <section class="section-actualite">
            <div class="grid-actualites">
                <article class="carte-actu">
                    <img src="assets/images/" alt="">
                    <h3>Inventaire 2026 du béluga : stabilisation confirmée, vigilance maintenue</h3>
                    <p>Les résultats du survol aérien annuel de la population de bélugas du Saint-Laurent confirment une
                        légère stabilisation à environ 1800 individus. Si la tendance reste fragile, elle témoigne de
                        l'efficacité des mesures de gestion de la navigation mises en place dans l'estuaire.</p>
                    <a href="#">Lire l'article</a>
                </article>
                <article class="carte-actu">
                    <img src="assets/images/" alt="">
                    <h3>Syndrome du museau blanc : des résultats prometteurs pour un traitement antifongique</h3>
                    <p>Des chercheurs de l'Université Laval et de l'Université McGill publient des résultats
                        encourageants sur l'efficacité d'un traitement à base de bactéries probiotiques pour lutter
                        contre le champignon responsable du syndrome du museau blanc chez les chauves-souris.</p>
                    <a href="#">Lire l'article</a>
                </article>
                <article class="carte-actu">
                    <img src="assets/images/" alt="">
                    <h3>Le caribou des bois : un plan de rétablissement renforcé pour les populations du Nord</h3>
                    <p>Le gouvernement du Québec annonce un investissement de 12 millions de dollars sur cinq ans pour
                        protéger les dernières populations de caribous des bois dans les régions de Charlevoix et de la
                        Côte-Nord, incluant la création de nouvelles zones de protection intégrale.</p>
                    <a href="#">Lire l'article</a>
                </article>
            </div>
        </section>

        <!-- Section Espèce à découvrir -->
        <section class="section-especes">
            <h2 class="qc-h2">Espèce à découvrir</h2>

            <div class="carte-espece clair">
                <img src="assets/images/IMG_Tortue-Luth_LouisabelleGagnon.jpg" alt="Tortue Luth">
                <div>
                    <h3>Tortue Luth</h3>
                    <p><em>Dermochelys coriacea</em></p>
                    <div class="tags">
                        <span class="badge">Reptile</span>
                        <span class="badge">Menacé</span>
                    </div>
                    <a href="especes/fiche/index.php?id=1" class="qc-btn qc-btn-secondary">En savoir plus</a>
                </div>
            </div>

            <div class="carte-espece fonce">
                <img src="assets/images/IMG_Lamproie-Nord.jpg" alt="Lamproie du Nord">
                <div>
                    <h3>Lamproie du Nord</h3>
                    <p><em>Ichthyomyzon fossor</em></p>
                    <div class="tags">
                        <span class="badge">Poisson</span>
                        <span class="badge">Menacé</span>
                    </div>
                    <a href="especes/fiche/index.php?id=2" class="qc-btn qc-btn-secondary">En savoir plus</a>
                </div>
            </div>

            <div class="carte-espece clair">
                <img src="assets/images/IMG_Ours-blanc_LarryMaster.jpg" alt="Ours Blanc">
                <div>
                    <h3>Ours Blanc</h3>
                    <p><em>Ursus maritimus</em></p>
                    <div class="tags">
                        <span class="badge">Mammifère</span>
                        <span class="badge">Vulnérable</span>
                    </div>
                    <a href="especes/fiche/index.php?id=3" class="qc-btn qc-btn-secondary">En savoir plus</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Section Statuts de protection -->
    <section class="section-statuts">
        <h2 class="qc-h2">Statuts de protection</h2>
        <div class="grille-statuts">
            <div class="carte-statut">
                <h3>Menacée</h3>
                <p>espèce, sous-espèce ou population dont la disparition est redoutée.</p>
                <a href="#">Voir les espèces menacées</a>
            </div>
            <div class="carte-statut">
                <h3>Vulnérable</h3>
                <p>espèce, sous-espèce ou population dont la survie est jugée précaire. Sa disparition n’est pas
                    redoutée à court ou à moyen terme</p>
                <a href="#">Voir les espèces vulnérables</a>
            </div>
        </div>
    </section>

    <!-- Section Mise à l'action et de sensibilisation -->
    <section class="section-sensibilisation">
        <h2 class="qc-h2">Mise à l'action et de sensibilisation</h2>

        <div class="bloc-pourquoi">
            <h3>Pourquoi protéger ces espèces ?</h3>
            <p>Chaque espèce joue un rôle essentiel dans l’équilibre des écosystèmes. Leur protection, c’est préserver
                la biodiversité, la qualité de nos mialieux naturels et notre patrimoine pour les générations futures.
            </p>
        </div>

        <div class="grille-piliers">
            <article class="pilier">
                <img src="assets/images/IMG_Caribou-forestier_JoelleTaillon.jpg" alt="Des écosystèmes en santé">
                <h4>Des écosystèmes en santé</h4>
            </article>
            <article class="pilier">
                <img src="assets/images/IMG_Bruant-sauterelle_larrymaser.jpg" alt="Un frein aux espèces envahissantes">
                <h4>Une nature plus résiliente</h4>
            </article>
            <article class="pilier">
                <img src="assets/images/IMG_Pic-tete-rouge_DominicGendron.jpg" alt="Un patrimoine naturel unique">
                <h4>Un patrimoine naturel unique</h4>
            </article>
        </div>

        <div class="conteneur-btn">
            <a href="especes/index.php" class="qc-btn qc-btn-secondary">Consulter la liste des espèces</a>
        </div>
    </section>

    <footer>
        <div class="navigation_footer">
            <a href="#"></a>
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
                <a target="_blank" rel="noopener" href="https://www.quebec.ca/droit-auteur">
                    © Gouvernement du Québec, 2026
                </a>
            </qc-external-link>
        </qc-piv-footer>
    </footer>
</body>

</html>