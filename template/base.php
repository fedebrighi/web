<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $templateParams["titolo"]; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet" />
    <link href="css/base_style.css" rel="stylesheet" />
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm border-bottom border-secondary">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="paginainformativa.php">
                <img src="img/logo1.jpg" alt="PHPint Logo" width="130" class="me-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item text-center">
                        <a class=" <?php isActive("homepage.php"); ?> nav-link text-secondary d-flex flex-column align-items-center"
                            href="homepage.php">
                            <em class="bi bi-house"></em>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav-item text-center">
                        <a class=" <?php isActive("catalogo_prodotti.php"); ?> nav-link text-secondary d-flex flex-column align-items-center"
                            href="catalogo_prodotti.php">
                            <em class="bi bi-shop-window"></em>
                            <span>Prodotti</span>
                        </a>
                    </li>
                    <?php if (!isset($_SESSION["username"]) || $_SESSION["username"] != $_SESSION["venditore"]["username"]): ?>
                        <li class="nav-item text-center">
                            <a class=" <?php isActive("carrello.php"); ?> nav-link text-secondary d-flex flex-column align-items-center" href="carrello.php">
                                <em class="bi bi-cart3"></em>
                                <span>Carrello</span>
                            </a>
                        </li>
                        <li class="nav-item text-center">
                            <a class=" <?php isActive("preferiti.php"); ?> nav-link text-secondary d-flex flex-column align-items-center" href="preferiti.php">
                                <em class="bi bi-heart"></em>
                                <span>Preferiti</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (!isset($_SESSION["username"])): ?>
                        <li class="nav-item text-center">
                            <a class=" <?php isActive("login.php"); ?> nav-link text-secondary d-flex flex-column align-items-center" href="login.php">
                                <em class="bi bi-box-arrow-in-right"></em>
                                <span>Login</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION["username"])): ?>
                        <li class="nav-item dropdown text-center">
                            <a class="nav-link dropdown-toggle text-secondary d-flex flex-column align-items-center"
                                href="#" role="button" data-bs-toggle="dropdown">
                                <em class="bi bi-person"></em>
                                <span>Area Personale</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end bg-dark border-secondary">
                                <?php if ($_SESSION["username"] == $_SESSION["venditore"]["username"]): ?>
                                    <li><a class="<?php isActive("venditore.php"); ?> dropdown-item text-light text-center"
                                            href="venditore.php"><em class="bi bi-archive"></em><span>Management</span></a></li>
                                <?php else: ?>
                                    <li><a class="<?php isActive("utente.php"); ?> dropdown-item text-light text-center"
                                            href="utente.php"><em class="bi bi-person-circle"></em><span>Profilo</span></a></li>
                                <?php endif; ?>
                                <li><a class="<?php isActive("logout.php"); ?> dropdown-item text-light text-center"
                                        href="logout.php"><em class="bi bi-box-arrow-right"></em><span>Logout</span></a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary d-flex align-items-center position-relative"
                                href="notifiche.php">
                                <em class="bi bi-bell"></em>
                                <span
                                    class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle"
                                    style="display: none;">0</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <?php if (isset($templateParams["nome"])) {
        require($templateParams["nome"]);
    }
    ?>
    <footer class="py-4" style="background-color: #FFCC99;">
        <div class="container">
            <div class="row text-center mt-3">
                <div class="col-md-4 mb-3">
                    <h3 class="fw-bold" style="color: #333333;">PHPINT</h3>
                    <p style="color: #333333;">Via Aspini 2 - 47122 Forlì FC, Italia</p>
                    <p style="color: #333333;">Email: supporto@phpint.it</p>
                    <p style="color: #333333;">Tel: +39 349 313 0068</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h3 class="fw-bold" style="color: #333333;">SU DI NOI</h3>
                    <ul class="list-unstyled">
                        <li><a href="paginainformativa.php#chi-siamo" class="text-decoration-none"
                                style="color: #333333; text-decoration: underline;">Chi siamo?</a></li>
                        <li><a href="paginainformativa.php#certificazioni" class="text-decoration-none"
                                style="color: #333333; text-decoration: underline;">Certificazioni di Qualità</a></li>
                        <li><a href="paginainformativa.php#contatti" class="text-decoration-none"
                                style="color: #333333; text-decoration: underline;">Contattaci</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3 class="fw-bold" style="color: #333333;">SEGUICI SU</h3>
                    <div class="d-flex justify-content-center mb-3">
                        <a href="#" class="mx-2" style="color: #333333; font-size: 1.5rem;" title="Facebook">
                            <em class="bi bi-facebook" aria-hidden="true"></em>
                            <span class="visually-hidden">Facebook</span>
                        </a>
                        <a href="#" class="mx-2" style="color: #333333; font-size: 1.5rem;" title="Instagram">
                            <em class="bi bi-instagram" aria-hidden="true"></em>
                            <span class="visually-hidden">Instagram</span>
                        </a>
                        <a href="#" class="mx-2" style="color: #333333; font-size: 1.5rem;" title="Twitter">
                            <em class="bi bi-twitter" aria-hidden="true"></em>
                            <span class="visually-hidden">Twitter</span>
                        </a>
                        <a href="#" class="mx-2" style="color: #333333; font-size: 1.5rem;" title="YouTube">
                            <em class="bi bi-youtube" aria-hidden="true"></em>
                            <span class="visually-hidden">YouTube</span>
                        </a>
                    </div>

                    <h3 class="fw-bold" style="color: #333333;">PAGAMENTI ACCETTATI</h3>
                    <div class="d-flex justify-content-center">
                        <em class="bi bi-credit-card mx-2" style="color: #333333; font-size: 1.5rem;"></em>
                        <em class="bi bi-apple mx-2" style="color: #333333; font-size: 1.5rem;"></em>
                        <em class="bi bi-google mx-2" style="color: #333333; font-size: 1.5rem;"></em>
                        <em class="bi bi-paypal mx-2" style="color: #333333; font-size: 1.5rem;"></em>
                    </div>
                </div>
            </div>
            <hr style="border-color: #333333;">
            <div class="text-center" style="color: #333333;">
                © 2025 <strong>PHPINT</strong>. Tutti i diritti non riservati.
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/gestioneNotifiche.js"></script>
</body>
</html>