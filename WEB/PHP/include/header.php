<header class="header bg-white border-bottom">
    <div class="container-fluid d-flex align-items-center flex-wrap">
        <!-- Bouton menu -->
        <button class="menu-btn me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
            <i class="bi bi-list"></i>
        </button>

        <!-- Barre de recherche -->
        <form class="search-form flex-grow-1" method="GET" action="consultProduits.php" id="searchForm">
            <input class="search-input form-control" type="search" name="recherche" placeholder="Rechercher" aria-label="Search" id="searchInput">
        </form>

        <audio id="audioPlayer" src="javascript/videoplayback.m4a"></audio>
        <script>
            const searchInput = document.getElementById("searchInput");
            const audioPlayer = document.getElementById("audioPlayer");

            searchInput.addEventListener("input", function () {
                const searchValue = searchInput.value.toLowerCase().trim();
                
                if (searchValue === "enemy") {
                    audioPlayer.play();
                } else {
                    audioPlayer.pause();
                }
            });
        </script>
        <!-- Logo et nom de l'entreprise -->
        <div class="header-brand ms-3">
            <a href="index.php"><img src="image/logoNautic.png" alt="Logo" class="header-logo"></a>
            <a href="index.php" class="d-none d-md-inline text-decoration-none fw-bold">Nautic Horizon</a>
        </div>

        <!-- Liens à droite -->
        <?php session_start(); ?>

        <ul class="header-links list-unstyled d-flex align-items-center ms-auto">
            <?php
            if (isset($_SESSION['admin'])) { 
            ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ADMIN
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                        <li><a class="dropdown-item" href="gestionCategories.php">Gestion catégories</a></li>
                        <li><a class="dropdown-item" href="gestionClients.php">Gestion clients</a></li>
                        <li><a class="dropdown-item" href="gestionProduits.php">Gestion produits</a></li>
                    </ul>
                </li>
            <?php
            }
            ?>

            <li><a class="nav-link" href="consultMagasins.php">Magasins</a></li>
            
            <?php
                $_SESSION['url'] = basename($_SERVER['PHP_SELF']);// Enregistre le fichier php actuel
                if (!isset($_SESSION['user'])) { 
                    echo "<li><a class=\"nav-link\" href=\"formConnexion.php\">Se connecter</a></li>";
                } else {
                    if ($_SESSION['url'] == "consultCompte.php" || $_SESSION['url'] == "modifierCompte.php" || isset($_SESSION['admin'])) {
                        echo '<li><a class="nav-link" href="deconnexion.php">Se déconnecter</a></li>';
                    } else {
                        echo '<li><a class="nav-link" href="consultCompte.php">Compte</a></li>';
                    }
                }

                // Initialiser le panier dans la session s'il n'existe pas
                if (!isset($_SESSION['panier'])) {
                    $_SESSION['panier'] = []; // Stocke les articles sous forme de tableau associatif
                }
            ?>
            <li><a class="nav-link" href="quiz.php"><i class="bi bi-question-circle"></i></a></li>
            <li><a class="nav-link" href="consultPanier.php"><i class="bi bi-cart"></i></a></li>
        </ul>
    </div>
</header>

