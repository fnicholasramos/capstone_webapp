function searchSuggestions() {
    const input = document.getElementById('searchInput').value;
    const suggestionBox = document.getElementById('suggestionBox');

    if (input.trim() === '') {
        suggestionBox.innerHTML = ''; // Clear suggestions if input is empty
        return;
    }

    fetch(`function/orders/search_suggestion.php?query=${encodeURIComponent(input)}`)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                suggestionBox.innerHTML = data
                    .map(patient => `<div onclick="selectPatient('${patient.name}')">${patient.name}</div>`)
                    .join('');
            } else {
                suggestionBox.innerHTML = '<div>No results found</div>';
            }
        })
        .catch(error => {
            console.error('Error fetching suggestions:', error);
            suggestionBox.innerHTML = '<div>Error fetching suggestions</div>';
        });
}

function selectPatient(name) {
    document.getElementById('searchInput').value = name;
    document.getElementById('patientName').innerText = name;
    document.getElementById('hiddenPatientName').value = name;
    document.getElementById('suggestionBox').innerHTML = ''; // Clear the suggestion box
}
