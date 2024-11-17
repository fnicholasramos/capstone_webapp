function openEditModal(id, name, room, fluid_name, volume, flow_rate, incorp, ivf_no, date_started, time_started, date_consumed, time_consumed, nurse, device) {
    document.getElementById('editId').value = id;
    document.getElementById('name').value = name;
    document.getElementById('room').value = room;
    document.getElementById('iv_name').value = fluid_name;
    document.getElementById('volume').value = volume;
    document.getElementById('flowRate').value = flow_rate;
    document.getElementById('incorp').value = incorp; 
    document.getElementById('iv_no').value = ivf_no;
    document.getElementById('dateStarted').value = date_started;
    document.getElementById('timeStarted').value = time_started;
    document.getElementById('dateConsumed').value = date_consumed;
    document.getElementById('timeConsumed').value = time_consumed;
    document.getElementById('nurse').value = nurse;
    document.getElementById('device').value = device;

    // Show the modal
    document.getElementById('editModal').style.display = 'block';

    document.getElementById('name').focus();
}

// exit 
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
