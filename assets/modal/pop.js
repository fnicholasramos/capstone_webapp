// Get the modal element
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var openModalBtn = document.getElementById("openModalBtn");

// Get the <span> element that closes the modal
var closeBtn = document.getElementsByClassName("close")[0];

// Get the cancel button
var cancelBtn = document.getElementById("cancel");

// Function to close the modal with animation
function closeModal() {
    modal.classList.remove("show");
    setTimeout(function () {
        modal.style.display = "none"; // Hide the modal after fade-out completes
    }, 400); // Wait for fade-out transition to complete
}

// Open modal with animation
openModalBtn.onclick = function () {
    modal.style.display = "block";
    modal.classList.add("show");
};

// Close modal when 'X' is clicked
closeBtn.onclick = closeModal;

// Close modal when Cancel button is clicked
cancelBtn.onclick = closeModal;

// Close modal when clicking outside the modal content
window.onclick = function (event) {
    if (event.target == modal) {
        closeModal();
    }
};
