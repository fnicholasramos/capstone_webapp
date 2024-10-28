function updateClock() {
    const dateDisplay = document.getElementById("date-display");
    const timeDisplay = document.getElementById("time-display");

    const now = new Date();
    const options = { weekday: 'short', month: 'short', day: 'numeric' };
    const dateString = now.toLocaleDateString('en-US', options);

    const hours = now.getHours();
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    const ampm = hours >= 12 ? 'pm' : 'am';

    const hourFormatted = hours % 12 || 12;
    const timeString = `${hourFormatted}:${minutes}:${seconds} ${ampm}`;

    dateDisplay.textContent = dateString;
    timeDisplay.textContent = timeString;
}

setInterval(updateClock, 1000);
updateClock(); // Initial call to set the time immediately