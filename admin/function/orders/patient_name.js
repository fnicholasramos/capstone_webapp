function copyPatientName() {
    // Copy the content of the <u> tag to the hidden input
    document.getElementById('hiddenPatientName').value = document.getElementById('patientName').textContent;
}