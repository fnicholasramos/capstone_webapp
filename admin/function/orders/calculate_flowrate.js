const volumeInput = document.getElementById('volume');
const flowRateInput = document.getElementById('flow_rate');
const answerElements = document.querySelectorAll('.second_flow_rate');
const hiddenInputAnswer = document.getElementById('hidden_answer');
const dropFactorInput = document.getElementById('drop_factor');
const minutesInput = document.getElementById('minutes');
const dripRateAnswerElement = document.getElementById('drip_rate_answer');

// Function to calculate flow rate and drip rate automatically
function calculateRates() {
    const volume = parseFloat(volumeInput.value) || 0; // Default to 0 if empty or invalid
    const flowRate = parseFloat(flowRateInput.value) || 0;
    const dropFactor = parseFloat(dropFactorInput.value) || 0;
    const minutes = parseFloat(minutesInput.value) || 0;

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

    if (secondFlowRate !== '' && dropFactor > 0 && minutes > 0) {
        const dripRate = (secondFlowRate * dropFactor) / minutes;
        dripRateAnswerElement.value = dripRate.toFixed(2); // Hidden input for backend
        document.getElementById('drip_rate_display').textContent = dripRate.toFixed(2); // Visible display

    } else {
        dripRateAnswerElement.textContent = '';
    }

    // Debug logs
    console.log("Drip Rate Element:", dripRateAnswerElement);
    console.log("Drip Rate Text Content:", dripRateAnswerElement.textContent);
}


// Attach the input event listeners to the fields
volumeInput.addEventListener('input', calculateRates);
flowRateInput.addEventListener('input', calculateRates);
dropFactorInput.addEventListener('input', calculateRates);
minutesInput.addEventListener('input', calculateRates);