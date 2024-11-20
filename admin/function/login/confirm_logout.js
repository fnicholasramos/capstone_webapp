function confirmLogout(event) {
    const userConfirmed = confirm("Are you sure you want to Logout?");
    if (!userConfirmed) {
        event.preventDefault();
    }
}