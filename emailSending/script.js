document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // prevent the form from submitting normally

    // Get form data
    var formData = new FormData(this);

    // Send form data to PHP script
    fetch('send_email.php', {
        method: 'POST',
        body: formData
    })

    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(data => {
        alert(data); // Display the response from PHP script
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error.message);
        alert('There was an error while sending the message. Please try again later.');
    });
});
