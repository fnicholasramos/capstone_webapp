function confirmChanges(event) {
    const userConfirmed = confirm("Do you want to save changes?");
    if (!userConfirmed) {
        event.preventDefault();
    }
}