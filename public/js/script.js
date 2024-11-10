document.getElementById('search-form').addEventListener('submit', function(event) {
    document.getElementById('search-input').value = '';  // Limpa o campo de busca
});

document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search-input");

    // Verifica se há algo no campo de busca
    if (searchInput && searchInput.value !== "") {
        // Limpa o campo de busca
        searchInput.value = "";

        // Remove o parâmetro da URL
        window.history.replaceState({}, document.title, window.location.pathname);
    }
});



