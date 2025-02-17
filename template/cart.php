<main class="bg-dark">
    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="text-warning">IL TUO CARRELLO</h1>
        </div>
        <?php if (isset($_SESSION["error_message"])): ?>
            <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark ">
                        <div class="modal-header border-secondary">
                            <h2 class="modal-title text-warning" id="errorModalLabel">Errore!</h2>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-danger"><?php echo $_SESSION["error_message"]; ?></p>
                        </div>
                        <div class="modal-footer border-secondary justify-content-center">
                            <form method="post" action="">
                                <button type="submit" name="reset_error" class="btn">OK</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php unset($_SESSION["error_message"]); ?>
        <?php endif; ?>

        <?php if (empty($templateParams["elementicarrello"])): ?>
            <div class="text-center my-5 d-flex flex-column justify-content-center align-items-center">
                <em class="bi bi-cart-x text-danger" style="font-size: 6rem;"></em> <!-- Icona carrello vuoto -->
                <h2 class="text-warning mt-4">IL TUO CARRELLO E' VUOTO!</h2>
                <p class="fs-4">Torna al catalogo per aggiungere dei prodotti e iniziare a riempirlo.</p>
                <button class="btn btn-lg mt-3" onclick="window.location.href='catalogo_prodotti.php';">
                    <em class="bi bi-arrow-right"></em> Vai al Catalogo
                </button>
            </div>
        <?php else: ?>
            <div class="row gy-3">
                <h2 class="fs-4 mb-3">Controlla i prodotti selezionati e procedi al pagamento per completare
                    l'acquisto.</h2>
                <?php
                $total = 0;
                foreach ($templateParams["elementicarrello"] as $item):
                    $birra = $dbh->getBeerDetails($item["codProdotto"]);
                    $itemTotal = $birra["prezzo"] * $item["quantita"];
                    $total += $itemTotal;
                ?>
                    <div class="col-12 d-flex align-items-center border-bottom border-secondary pb-3 carrello-item"
                        data-id="<?php echo $item['codProdotto']; ?>">
                        <form action="prodotto_in_dettaglio.php" method="POST" class="mb-2">
                            <input type="hidden" name="codice" value="<?php echo $birra['codProdotto']; ?>">
                            <button type="submit" class="p-0 border-0 bg-transparent">
                                <img src="img/beers/<?php echo $birra['immagine']; ?>" alt="<?php echo $birra['nome']; ?>"
                                    class="img-fluid me-3" style="width: 80px;">
                            </button>
                        </form>
                        <div class="flex-grow-1">
                            <h3 class="m-0"><?php echo $birra["nome"] ?></h3>
                            <p class="m-0">alc. <?php echo $birra["alc"] ?>% vol</p>
                            <p class="m-0 fw-bold prezzo"><?php echo $birra["prezzo"] ?> €</p>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <div class="d-flex align-items-center mb-2">
                                <label for="quantita-<?php echo $item['codProdotto']; ?>" class="me-2">Quantità:</label>
                                <input type="number" id="quantita-<?php echo $item['codProdotto']; ?>"
                                    class="form-control form-control-sm text-center quantita" min="1"
                                    value="<?php echo $item['quantita']; ?>"
                                    style="width: 40px; height: 25px; border-radius: 50px; padding: 2px;" data-quantity="true"
                                    onchange="aggiornaQuantitaCartAPI(<?php echo $item['codProdotto']; ?>, this.value)">
                            </div>
                            <button class="btn btn-sm w-100 remove-from-cart"
                                onclick="removeFromCart(<?php echo $templateParams['codCarrello']['codCarrello']; ?>,<?php echo $item['codProdotto']; ?>)">
                                <em class="bi bi-trash me-1"></em>Rimuovi
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mt-4 p-3 border border-secondary rounded">
                <h4 class="mb-3 fs-4 text-warning">RIEPILOGO DELL'ORDINE:</h4>
                <ul class="list-unstyled">
                    <li class="d-flex justify-content-between">
                        <span class="fs-4">Tipologie di birre presenti nel carrello:</span>
                        <span class="fs-4"
                            id="tipologie-carrello"><?php echo count($templateParams["elementicarrello"]); ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span class="fs-4">Quantità totale di birre presenti nel carrello:</span>
                        <span class="fs-4" id="quantita-totale">
                            <?php
                            $quantitaTotale = 0;
                            foreach ($templateParams["elementicarrello"] as $item) {
                                $quantitaTotale += $item["quantita"];
                            }
                            echo $quantitaTotale;
                            ?>
                        </span>
                    </li>
                    <li class="d-flex justify-content-between border-top pt-2 mt-2">
                        <strong class="fs-4 text-warning">TOTALE:</strong>
                        <strong class="text-warning fs-3" id="totale-carrello">
                            <?php
                            $total = 0;
                            foreach ($templateParams["elementicarrello"] as $item) {
                                $birra = $dbh->getBeerDetails($item["codProdotto"]);
                                $total += $birra["prezzo"] * $item["quantita"];
                            }
                            echo number_format($total, 2);
                            ?> €
                        </strong>
                    </li>
                </ul>
            </div>
            <div id="button-container" class="d-flex flex-column gap-3 mt-4">
                <button class="btn" type="button" onclick="window.location.href='catalogo_prodotti.php';">
                    <em class="bi bi-cart"></em>
                    Continua a fare acquisti
                </button>
                <button class="btn" type="button" onclick="window.location.href='checkout.php';">
                    <em class="bi bi-credit-card"></em>
                    Procedi al pagamento
                </button>
            </div>
        <?php endif; ?>
    </div>
    <script src="js/rimuoviDalCarrello.js"></script>
    <script src="js/spesaTotale.js"></script>
    <script src="js/aggiornaQuantita.js"></script>
    <script src="js/erroreOrdine.js"></script>
</main>