document.addEventListener('DOMContentLoaded', function() {
    // Validation
    var form = document.getElementById('wpcf');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            // Serialize form data
            var formData = new FormData(form);

            // AJAX request
            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.getAttribute('action'), true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    if (xhr.responseText === 'success') {
                        // On success
                        form.style.display = 'none'; // Hide the form
                        var statusMsg = document.getElementById('statusMsg');
                        if (statusMsg) {
                            statusMsg.innerHTML = 'Your message was successfully sent!';
                            statusMsg.style.display = 'block';
                            statusMsg.style.color = 'green';
                        }
                    }
                } else {
                    // On error
                    alert(xhr.statusText);
                }
            };
            xhr.onerror = function() {
                // On network errors
                alert('There was an error with the request.');
            };
            xhr.send(formData); // Send form data

            return false; // Prevent default form submission
        });
    }
});
