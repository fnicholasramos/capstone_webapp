// Toggle the dropdown visibility
function toggleDropdown(event) {
    // Close any open dropdowns
    document.querySelectorAll('.dropdown').forEach(dropdown => {
        if (dropdown !== event.currentTarget.parentNode) {
            dropdown.classList.remove('show');
        }
    });

    // Toggle the clicked dropdown
    event.currentTarget.parentNode.classList.toggle('show');
}

// Close the dropdown if clicked outside
window.onclick = function(event) {
    if (!event.target.matches('.dropdown-button')) {
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            dropdown.classList.remove('show');
        });
    }
};
