// JavaScript to disable form and display countdown timer
document.addEventListener('DOMContentLoaded', function() {
    // Only proceed if attempts are greater than or equal to 3
    if (window.attempts >= 3) {
        disableForm();
        // Pass the remaining lockout time from PHP to JavaScript
        startCountdown(window.lockoutTime);
    }
});

function disableForm() {
    document.getElementById("loginForm").querySelectorAll("input, button").forEach(element => {
        element.disabled = true;
    });
}

function startCountdown(duration) {
    const countdownMessage = document.getElementById("countdownMessage");
    countdownMessage.style.display = 'block';

    let remainingTime = duration;

    const interval = setInterval(() => {
        countdownMessage.textContent = "Too many attempts. Try again in " + remainingTime + " seconds.";

        if (remainingTime <= 0) {
            clearInterval(interval);
            countdownMessage.style.display = 'none';
            enableForm();
        }
        remainingTime--;
    }, 1000);
}

function enableForm() {
    document.getElementById("loginForm").querySelectorAll("input, button").forEach(element => {
        element.disabled = false;
    });
}
