document.addEventListener('DOMContentLoaded', function() {
    const successMessage = document.getElementById('successMessage');
    if (successMessage) {
        successMessage.style.display = 'block';
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 5000);
    }
});

