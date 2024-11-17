document.getElementById('search-form').addEventListener('submit', function(event) {
    document.getElementById('search-input').value = ''; 
});

document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search-input");

    if (searchInput && searchInput.value !== "") {
        
        searchInput.value = "";

        window.history.replaceState({}, document.title, window.location.pathname);
    }
});



