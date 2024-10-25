function keepPlaceholderVisible(inputElement) {
    const originalPlaceholder = inputElement.placeholder;
    
    inputElement.addEventListener('input', function() {
        if (inputElement.value !== '') {
            inputElement.placeholder = originalPlaceholder;
        }
    });

    // Optional: reset placeholder on blur for consistency
    inputElement.addEventListener('blur', function() {
        inputElement.placeholder = originalPlaceholder;
    });
}

// Apply the function to each input
keepPlaceholderVisible(document.getElementById('metric'));
keepPlaceholderVisible(document.getElementById('metric'));