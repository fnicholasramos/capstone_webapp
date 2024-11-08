
// --------------------------------------------------------------

// monitoring.php

// Get the modal element
var modal = document.getElementById("editModal");

// Get the cancel button
var cancelBtn = document.getElementById("cancel");

// Close modal when Cancel button is clicked
cancelBtn.onclick = closeModal;

// Close modal when clicking outside the modal content
window.onclick = function (event) {
    if (event.target == modal) {
        closeModal();
    }
};

// --------------------------------------------------------------

