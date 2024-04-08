<header>
    <nav class="navbar navbar-expand-md bg-black-perso border-bottom border-3 border-danger mb-5" data-bs-theme="dark">
        <div class="container-fluid mx-3">
            <div class="d-flex justify-content-start">
                <a class="navbar-brand" href="index.php"> <img src="./assets/image/logo.png" width="140"></a>
            </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <?php if (isset($pseudo)): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fs-3 text-blanc me-4" href="#" role="button" data-bs-toggle="dropdown">
                                    <?= $pseudo ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="ajouter_film.php">Ajouter un film</a></li>
                                    <li><a class="dropdown-item" href="deconnecter.php">Se déconnecter</a></li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link fs-3 text-blanc" href="creerCompte.php">|créer un compte| </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-3 text-blanc" href="login.php">|se connecter|</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
        </div>
    </nav>
</header>