document.addEventListener('DOMContentLoaded', () => {
    // Fetch data from your database and populate the lists
    fetchProducts('standard-business-cards', 'standard');
    fetchProducts('specialty-business-cards', 'specialty');
});

function fetchProducts(elementId, category) {
    fetch(`/api/products?category=${category}`)
        .then(response => response.json())
        .then(products => {
            const list = document.getElementById(elementId);
            products.forEach(product => {
                const listItem = document.createElement('li');
                listItem.textContent = product.name;
                list.appendChild(listItem);
            });
        })
        .catch(error => console.error('Error fetching products:', error));
}
