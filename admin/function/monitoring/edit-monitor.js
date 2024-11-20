function openEditModal(id, name, room, fluid_name, volume, flow_rate, answer, drop_factor, minutes, drip_rate_answer, incorp, ivf_no, date_started, time_started, date_consumed, time_consumed, nurse, device) {
    document.getElementById('editId').value = id;
    document.getElementById('name').value = name;
    document.getElementById('device').value = device;
    document.getElementById('room').value = room;
    document.getElementById('iv_name').value = fluid_name;

    document.getElementById('volume').value = volume;
    document.getElementById('flow_rate').value = flow_rate;
    document.getElementById('answer').value = answer;

    document.getElementById('drop_factor').value = drop_factor;
    document.getElementById('minutes').value = minutes;

    const dripRateAnswerElement = document.querySelector('.drip_rate_answer');
    if (dripRateAnswerElement) {
        dripRateAnswerElement.textContent = drip_rate_answer;
    }

    document.getElementById('incorp').value = incorp;
    document.getElementById('iv_no').value = ivf_no;
    document.getElementById('dateStarted').value = date_started;
    document.getElementById('timeStarted').value = time_started;
    document.getElementById('dateConsumed').value = date_consumed;
    document.getElementById('timeConsumed').value = time_consumed;
    document.getElementById('nurse').value = nurse;
    

    calculateRates(); // Call the function to update rates when modal is opened

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

// Calculate Flowrate
const volumeInput = document.getElementById('volume');
const flowRateInput = document.getElementById('flow_rate');
const answerElements = document.querySelectorAll('.second_flow_rate');
const hiddenInputAnswer = document.getElementById('hidden_answer');
const dropFactorInput = document.getElementById('drop_factor');
const minutesInput = document.getElementById('minutes');
const dripRateAnswerElement = document.querySelector('.drip_rate_answer');

// Function to calculate flow rate and drip rate automatically
function calculateRates() {
    const volume = parseFloat(volumeInput.value) || 0;
    const flowRate = parseFloat(flowRateInput.value) || 0;

    let secondFlowRate = '';
    if (flowRate > 0) {
        secondFlowRate = Math.floor(volume / flowRate);

        answerElements.forEach(element => {
            element.textContent = secondFlowRate;
        });
        hiddenInputAnswer.value = secondFlowRate;
    } else {
        answerElements.forEach(element => {
            element.textContent = '';
        });
        hiddenInputAnswer.value = '';
    }

    const dropFactor = parseFloat(dropFactorInput.value) || 0;
    const minutes = parseFloat(minutesInput.value) || 0;
    const hiddenDripRateAnswer = document.getElementById('drip_rate_answer');

    if (secondFlowRate && dropFactor > 0 && minutes > 0) {
        const dripRate = (secondFlowRate * dropFactor) / minutes;
        dripRateAnswerElement.textContent = dripRate.toFixed(2);
        hiddenDripRateAnswer.value = dripRate.toFixed(2);
    } else {
        dripRateAnswerElement.textContent = '';
        hiddenDripRateAnswer.value = '';
    }
}


// Attach the input event listeners to the fields
volumeInput.addEventListener('input', calculateRates);
flowRateInput.addEventListener('input', calculateRates);
dropFactorInput.addEventListener('input', calculateRates);
minutesInput.addEventListener('input', calculateRates);
