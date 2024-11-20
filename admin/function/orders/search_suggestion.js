function searchSuggestions() {
    const input = document.getElementById('searchInput').value;

    if (input === "") {
        document.getElementById('suggestionBox').style.display = 'none';
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'function/orders/search_suggestion.php?query=' + encodeURIComponent(input), true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const suggestionBox = document.getElementById('suggestionBox');
            suggestionBox.innerHTML = xhr.responseText;
            if (xhr.responseText.trim()) {
                suggestionBox.style.display = 'block';
            } else {
                suggestionBox.style.display = 'none';
                suggestionBox.innerHTML = '<div>No results found</div>';
            }
        }
    };
    xhr.send();
}

// Move this function outside of `searchSuggestions`
function selectPatient(name) {
    document.getElementById('searchInput').value = name;
    document.getElementById('suggestionBox').innerHTML = ''; // Clear the suggestion box
    document.getElementById('suggestionBox').style.display = 'none'; // Hide the suggestion box
}
