<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["titolo"];?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" />
</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm border-bottom border-secondary">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="homepage.html">
                <img src="img/logo.jpg" alt="PHPint Logo" width="40" class="me-2">
                <span class="fs-2 fw-bold text-warning">PHPint</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- Link Home -->
                    <li class="nav-item">
                        <a <?php isActive("homepage.php");?> class="nav-link text-secondary d-flex align-items-center" href="homepage.php">
                            <i class="bi bi-house me-1"></i> Home
                        </a>
                    </li>

                    <!-- Link Prodotti -->
                    <li class="nav-item">
                        <a <?php isActive("catalogo_prodotti.php");?> class="nav-link text-secondary d-flex align-items-center" href="catalogo_prodotti.php">
                            <i class="bi bi-shop-window me-1"></i> Prodotti
                        </a>
                    </li>

                    <!-- Link Carrello -->
                    <li class="nav-item">
                        <a <?php isActive("carrello.php");?> class="nav-link text-secondary d-flex align-items-center" href="carrello.php">
                            <i class="bi bi-cart3 me-1"></i> Carrello
                        </a>
                    </li>

                    <!-- Link Login -->
                    <li class="nav-item">
                        <a <?php isActive("login.php");?>  class="nav-link text-secondary d-flex align-items-center" href="login.php">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                    </li>

                    <!-- Area Personale -->
                    <li class="nav-item dropdown">
                        <a <?php isActive("utente.php");?> class="nav-link dropdown-toggle text-secondary d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i> Area Personale
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end bg-dark border-secondary">
                            <li><a class="dropdown-item text-light" href="utente.html"><i class="bi bi-gear me-1"></i> Impostazioni</a></li>
                            <li><a class="dropdown-item text-light" href="venditore.html"><i class="bi bi-archive me-1"></i> Storico Ordini</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-light" href="logout.html"><i class="bi bi-box-arrow-right me-1"></i> Logout</a></li>
                        </ul>
                    </li>

                    <!-- Notifiche -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-secondary d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-bell"></i>
                            <span class="badge bg-danger rounded-pill ms-1" id="notification-count">3</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end bg-dark border-secondary">
                            <li><h6 class="dropdown-header text-warning">Notifiche</h6></li>
                            <li>
                                <a class="dropdown-item text-light d-flex justify-content-between align-items-center" href="#">
                                    <span>Nuovo ordine ricevuto</span>
                                    <button class="btn btn-sm btn-success ms-2">Segna come letto</button>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-light d-flex justify-content-between align-items-center" href="#">
                                    <span>Promozione scaduta</span>
                                    <button class="btn btn-sm btn-success ms-2">Segna come letto</button>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-light d-flex justify-content-between align-items-center" href="#">
                                    <span>Prodotto esaurito</span>
                                    <button class="btn btn-sm btn-success ms-2">Segna come letto</button>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-light text-center" href="#">Visualizza tutte le notifiche</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container py-3">
            <div class="text-center mb-5">
                <h1 class="fs-1 font-sans-serif">PHPint</h1>
                <p class="fs-4 font-sans-serif">{WHEN CODING HITS HARD}</p>
            </div>

            <div class="row align-items-center">
                <!-- Colonna Carosello -->
                <div class="col-md-6 text-center">
                    <!-- Carousel -->
                    <div id="beerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/beers/emilia.png" class="d-block w-100 img-fluid" alt="Emilia Paranoica">
                            </div>
                            <div class="carousel-item">
                                <img src="img/beers/bluetornado.png" class="d-block w-100 img-fluid" alt="Blue Tornado">
                            </div>
                            <div class="carousel-item">
                                <img src="img/beers/macarena.png" class="d-block w-100 img-fluid" alt="Macarena Remix">
                            </div>
                            <div class="carousel-item">
                                <img src="img/beers/molly.png" class="d-block w-100 img-fluid" alt="Molly">
                            </div>
                            <div class="carousel-item">
                                <img src="img/beers/kiwi.png" class="d-block w-100 img-fluid" alt="Kiwi Passenger">
                            </div>
                            <div class="carousel-item">
                                <img src="img/beers/charlie.png" class="d-block w-100 img-fluid" alt="Charlie">
                            </div>
                            <div class="carousel-item">
                                <img src="img/beers/don.png" class="d-block w-100 img-fluid" alt="Don">
                            </div>
                            <div class="carousel-item">
                                <img src="img/beers/panda.png" class="d-block w-100 img-fluid" alt="Panda">
                            </div>
                            <div class="carousel-item">
                                <img src="img/beers/confidential.png" class="d-block w-100 img-fluid" alt="Confidential">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#beerCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#beerCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <!-- Colonna Pulsanti -->
                <div class="col-md-6">
                    <div class="d-grid gap-3">
                        <a href="catalogo_prodotti.html" class="btn btn-custom btn-lg fw-bold">
                            <i class="bi bi-basket"></i> SCOPRI I NOSTRI PRODOTTI
                        </a>
                        <a href="abbinamenti.html" class="btn btn-custom btn-lg fw-bold">
                            <i class="bi bi-info-circle"></i> VISUALIZZA I CONSIGLI PER LE BIRRE
                        </a>
                        <a href="carrello.html" class="btn btn-custom btn-lg fw-bold">
                            <i class="bi bi-cart-check"></i> CONTROLLA LO STATO DEL TUO CARRELLO
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sezione Testimonianze -->
        <section class="bg-dark py-3">
            <div class="container text-center">
                <h2 class="fs-3 mb-4">COSA DICONO I NOSTRI CLIENTI</h2>
                <div class="row">
                    <div class="col-md-4">
                        <p class="fs-5">"Birre fantastiche e servizio impeccabile! 🔥"</p>
                        <small>- Mattia</small>
                    </div>
                    <div class="col-md-4">
                        <p class="fs-5">"Il miglior negozio di birre artigianali che abbia mai trovato."</p>
                        <small>- Monia</small>
                    </div>
                    <div class="col-md-4">
                        <p class="fs-5">"Birre fantastiche, perfette da abbinare ad una buona pizza! 🍕🍺 Qualità top,
                            consigliatissimo!"</p>
                        <small>- Dave</small>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="divider"></div>
    <footer class="bg-dark py-2">
        <div class="container text-center">
            <a href="paginainformativa.html" class="d-block mb-2">Contatti</a>
            <a href="paginainformativa.html" class="d-block mb-2">Chi siamo?</a>
            <a href="paginainformativa.html">Specifiche aziendali</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/carousel.js"></script>
</body>

</html>