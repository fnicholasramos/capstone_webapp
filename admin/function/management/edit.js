function openEditModal(id, name, dob, admitDate, admitTime) {
    document.getElementById('editId').value = id;
    document.getElementById('editPatientName').value = name;
    document.getElementById('editDateOfBirth').value = dob;
    document.getElementById('editAdmitDate').value = admitDate;
    document.getElementById('editAdmitTime').value = admitTime;

    // Show the modal
    document.getElementById('editModal').style.display = 'block';

    document.getElementById('editPatientName').focus();
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}

// Close the modal when clicking outside of it
window.onclick = function(event) {
    const modal = document.getElementById('editModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}
