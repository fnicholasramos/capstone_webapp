function insertText() {
    // Get the input field value
    const inputText = document.getElementById('searchInput').value;
    
    // Get the <u> element where the name should be inserted
    const patientNameElement = document.getElementById('patientName');
    
    // Insert the text into the <u> element
    patientNameElement.textContent = inputText;
    
    // Optionally clear the input field after inserting
    document.getElementById('searchInput').value = '';
}
