function updatePriceLabel() {
    const min = parseFloat(document.getElementById("priceMin").value).toFixed(2);
    const max = parseFloat(document.getElementById("priceMax").value).toFixed(2);
    document.getElementById("priceMinLabel").innerText = `${min} €`;
    document.getElementById("priceMaxLabel").innerText = `${max} €`;
}

function updateAlcoholLabel() {
    const min = parseFloat(document.getElementById("alcoholMin").value).toFixed(1);
    const max = parseFloat(document.getElementById("alcoholMax").value).toFixed(1);
    document.getElementById("alcoholMinLabel").innerText = `${min}%`;
    document.getElementById("alcoholMaxLabel").innerText = `${max}%`;
}

function filterProducts() {
    const searchQuery = document.getElementById('searchBar').value.toLowerCase();
    const glutenFreeOnly = document.getElementById('glutenFreeFilter').checked;
    const priceMin = parseFloat(document.getElementById('priceMin').value);
    const priceMax = parseFloat(document.getElementById('priceMax').value);
    const alcoholMin = parseFloat(document.getElementById('alcoholMin').value);
    const alcoholMax = parseFloat(document.getElementById('alcoholMax').value);

    const products = document.querySelectorAll('.product-item');

    products.forEach(product => {
        const name = product.getAttribute('data-name');
        const glutenFree = product.getAttribute('data-glutenfree') === 'glutenFree';
        const price = parseFloat(product.getAttribute('data-price'));
        const alcohol = parseFloat(product.getAttribute('data-alcohol'));

        let isVisible = true;

        if (searchQuery && !name.includes(searchQuery)) {
            isVisible = false;
        }
        if (glutenFreeOnly && !glutenFree) {
            isVisible = false;
        }
        if (price < priceMin || price > priceMax) {
            isVisible = false;
        }
        if (alcohol < alcoholMin || alcohol > alcoholMax) {
            isVisible = false;
        }

        product.style.display = isVisible ? 'block' : 'none';
    });
}

document.addEventListener("DOMContentLoaded", () => {
    const filterButton = document.getElementById("toggleFilterButton");
    const filterContainer = document.getElementById("filterContainer");

    filterContainer.addEventListener('shown.bs.collapse', () => {
        filterButton.innerHTML = '<em class="bi bi-filter me-2"></em> Nascondi i Filtri sui Prodotti';
    });

    filterContainer.addEventListener('hidden.bs.collapse', () => {
        filterButton.innerHTML = '<em class="bi bi-filter me-2"></em> Mostrami i Filtri sui Prodotti';
    });

    updatePriceLabel();
    updateAlcoholLabel();
});