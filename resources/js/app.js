import './bootstrap';
document.getElementById('search-form').addEventListener('submit', function(event) {
    document.getElementById('search-input').value = '';  // Limpa o campo de busca
});