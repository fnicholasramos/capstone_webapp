function searchSuggestions() {
    const input = document.getElementById('searchInput').value;

    if (input === "") {
        document.getElementById('suggestionBox').style.display = 'none';
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'function/orders/search_suggestion.php?query=' + input, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const suggestionBox = document.getElementById('suggestionBox');
            suggestionBox.innerHTML = xhr.responseText;

            if (xhr.responseText) {
                suggestionBox.style.display = 'block';
            } else {
                suggestionBox.style.display = 'none';
            }
        }
    };

    xhr.send();
}

function selectSuggestion(text) {
    document.getElementById('searchInput').value = text;
    document.getElementById('suggestionBox').style.display = 'none';
}
