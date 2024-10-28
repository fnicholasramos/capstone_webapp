function searchTable() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('patientTable');
    const rows = table.getElementsByTagName('tr');

    // Clear previous highlights
    clearHighlights();

    if (!filter) {
        for (let i = 1; i < rows.length; i++) {
            rows[i].style.display = ''; // Show all rows
        }
        return; // Exit the function if search is cleared
    }

    for (let i = 1; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        let match = false;

        for (let j = 0; j < cells.length - 1; j++) { // Skip the last cell (Actions)
            const cell = cells[j];
            const cellText = cell.textContent || cell.innerText;

            if (filter && cellText.toLowerCase().indexOf(filter) > -1) {
                match = true;

                // Highlight the matching text without changing HTML structure
                const regex = new RegExp(`(${filter})`, 'gi');
                cell.innerHTML = cellText.replace(regex, '<span class="highlight">$1</span>');
            }
        }

        // Show or hide row based on match
        rows[i].style.display = match ? '' : 'none';
    }
}

function clearHighlights() {
    const table = document.getElementById('patientTable');
    const rows = table.getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        for (let j = 0; j < cells.length - 1; j++) { // Skip the last cell (Actions)
            const cell = cells[j];
            cell.innerHTML = cell.textContent || cell.innerText;
        }
    }
}
