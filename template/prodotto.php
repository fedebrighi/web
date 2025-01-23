<main>
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-12 col-md-5 text-center">
                <img src="img/beers/<?php echo $templateParams["birra"]["immagine"] ?>"
                    alt="<?php echo $templateParams["birra"]["codProdotto"] ?>" class="img-fluid mb-3" />
            </div>
            <div class="col-12 col-md-7">
                <h2><?php echo $templateParams["birra"]["nome"] ?></h2>
                <p class="">ALC. <?php echo $templateParams["birra"]["alc"] ?> % vol</p>
                <p>
                    <?php echo $templateParams["birra"]["descrizione"] ?>
                </p>
                <p><strong>INGREDIENTI: <?php echo $templateParams["birra"]["listaIngredienti"]; ?></strong></p>

                <!-- Contenitore per Quantità, Carrello e Preferiti -->
                <div class="d-flex align-items-center gap-3 mt-4">
                    <!-- Quantità -->
                    <div class="d-flex align-items-center">
                        <label for="quantity-<?php echo $templateParams['birra']['codProdotto']; ?>"
                            class="form-label me-2">Quantità:</label>
                        <input type="number" id="quantity-<?php echo $templateParams['birra']['codProdotto']; ?>"
                            class="form-control me-2" style="width: 60px; height: 35px; border-radius: 5px;" min="1"
                            value="1" />
                    </div>

                    <div id="button-container" class="d-flex flex-column gap-3">
                        <!-- Aggiungi al Carrello -->
                        <div>
                            <?php if (!empty($_SESSION["username"])): ?>
                                <button class="btn w-100 w-sm-auto" style="font-weight: bold; padding: 0.5rem;" onclick="addToCart(<?php echo $templateParams['codCarrello']['codCarrello']; ?>,
                <?php echo $templateParams['birra']['codProdotto']; ?>,
                document.getElementById('quantity-<?php echo $templateParams['birra']['codProdotto']; ?>').value)">
                                    <i class="bi bi-cart me-2"></i> Aggiungi il prodotto al tuo Carrello
                                </button>
                            <?php else: ?>
                                <button class="btn w-100 w-sm-auto" style="font-weight: bold; padding: 0.5rem;">
                                    <i class="bi bi-cart me-2"></i> Aggiungi il prodotto al tuo Carrello
                                </button>
                            <?php endif; ?>
                        </div>

                        <!-- Aggiungi ai Preferiti -->
                        <div>
                            <button id="btn-favorite-<?php echo $templateParams['birra']['codProdotto']; ?>"
                                class="btn w-100 w-sm-auto" style="font-weight: bold; padding: 0.5rem;"
                                onclick="toggleFavorite(<?php echo $templateParams['birra']['codProdotto']; ?>)">
                                <i id="icon-favorite-<?php echo $templateParams['birra']['codProdotto']; ?>"
                                    class="bi <?php echo (isset($templateParams["preferiti"]) && is_array($templateParams["preferiti"]) && in_array($templateParams["birra"]["codProdotto"], $templateParams["preferiti"])) ? 'bi-heart-fill' : 'bi-heart'; ?>"></i>
                                <span id="favorite-text-<?php echo $templateParams['birra']['codProdotto']; ?>">
                                    <?php echo (isset($templateParams["preferiti"]) && is_array($templateParams["preferiti"]) && in_array($templateParams["birra"]["codProdotto"], $templateParams["preferiti"])) ? 'Rimuovi il prodotto dai tuoi preferiti' : 'Aggiungi il prodotto ai tuoi Preferiti'; ?>
                                </span>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Riquadro per le recensioni -->
                <div class="mt-5 border border-secondary rounded p-4">
                    <h4 class="text-warning">Recensioni</h4>
                    <?php if (!empty($templateParams["recensioni"])): ?>
                        <ul class="list-unstyled">
                            <?php foreach ($templateParams["recensioni"] as $recensione): ?>
                                <li class="border-bottom pb-3 mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <i
                                                class="bi <?php echo $i <= $recensione["valutazione"] ? 'bi-star-fill text-warning' : 'bi-star text-secondary'; ?>"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <p class="mb-1">
                                        <?php echo htmlspecialchars($recensione["testo"] ?: "Nessun commento."); ?>
                                    </p>
                                    <small class="text-muted">Da
                                        <?php echo htmlspecialchars($recensione["username"]); ?></small>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>Non ci sono recensioni per questa birra. Sii il primo a lasciare una
                            recensione!</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="js/aggiungiAlCarrello.js"></script>
<script src="js/favourites.js"></script>