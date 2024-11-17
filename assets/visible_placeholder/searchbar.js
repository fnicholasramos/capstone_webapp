function searchTable() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('patientTable'); // Search within tbody only
    const rows = table.getElementsByTagName('tr');

    console.log('Search triggered with filter:', filter); // Debugging line
    // Clear previous highlights
    clearHighlights();

    if (!filter) {
        for (let i = 0; i < rows.length; i++) {  // Show all rows if search is cleared
            rows[i].style.display = '';  // Show all rows
        }
        return;
    }

    // Loop through each row and check if any cell contains the search term
    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        let match = false;

        for (let j = 0; j < cells.length - 1; j++) { // Skip the last cell (Actions)
            const cell = cells[j];
            const cellText = cell.textContent || cell.innerText;

            if (cellText.toLowerCase().indexOf(filter) > -1) {
                match = true;
                const regex = new RegExp(`(${filter})`, 'gi');
                cell.innerHTML = cellText.replace(regex, '<span class="highlight">$1</span>');  // Highlight match
            }
        }

        // Show or hide row based on match
        rows[i].style.display = match ? '' : 'none';
    }
}
function clearHighlights() {
    const table = document.getElementById('patientTable');
    const rows = table.getElementsByTagName('tr');

    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        for (let j = 0; j < cells.length - 1; j++) {  // Skip the last cell (Actions)
            const cell = cells[j];
            cell.innerHTML = cell.textContent || cell.innerText;  // Reset the cell content
        }
    }
}
