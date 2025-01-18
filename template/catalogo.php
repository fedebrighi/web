<main>
    <div class="container py-4">
        <div class="text-center mb-4">
            <h2 class="text-warning">Scopri le nostre birre artigianali!</h2>
            <p class="text-light">Scegli la tua preferita e abbinala ai tuoi momenti speciali.</p>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php foreach ($templateParams["birre"] as $birra): ?>
            <div class="col">
                <div class="d-flex align-items-center border-bottom border-secondary pb-3">
                    <a href="prodotto_in_dettaglio.php?id=<?php echo $birra['codProdotto']; ?>">
                        <img src="img/beers/<?php echo $birra["immagine"]; ?>" alt="<?php echo $birra["nome"]; ?>" class="img-fluid me-3" style="width: 150px;">
                    </a>
                    <div>
                        <h2 class="m-0 fs-4"><?php echo $birra["nome"]; ?></h2>
                        <p class="m-0 fs-5">alc. <?php echo $birra["alc"]; ?> % vol</p>
                        <p class="m-0 fw-bold fs-5"><?php echo $birra["prezzo"]; ?> €</p>
                    </div>
                    <div class="ms-auto d-flex flex-column align-items-stretch">
                        <div class="d-flex align-items-center mb-2">
                            <label for="quantity-<?php echo $birra['codProdotto']; ?>" class="me-2">Quantità:</label>
                            <input type="number" id="quantity-<?php echo $birra['codProdotto']; ?>" class="form-control text-center" min="1" value="1" style="width: 40px; height: 25px; border-radius: 50px; padding: 2px;">
                        </div>
                        <?php if(!empty($_SESSION["username"])) : ?>
                            <button class="btn btn-warning btn-sm mb-2" style="height: 40px; font-weight: bold; padding: 0.5rem;" onclick="addToCart(<?php echo $templateParams['codCarrello']['codCarrello']; ?>,
                                <?php echo $birra['codProdotto']; ?>,
                                document.getElementById('quantity-<?php echo $birra['codProdotto']; ?>').value)">  Aggiungi </button>
                        <?php else : ?>
                            <button class="btn btn-warning btn-sm mb-2" style="height: 40px; font-weight: bold; padding: 0.5rem;"> Aggiungi </button>
                        <?php endif; ?>
                        <a href="prodotto_in_dettaglio.php?id=<?php echo $birra['codProdotto']; ?>" class="btn btn-warning btn-sm text-center" style="height: 40px; font-weight: bold; padding: 0.5rem;">Scopri</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<script src="js/aggiungiAlCarrello.js"></script>
