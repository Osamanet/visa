$(document).ready(function () {
    // Handle Visa Check Form submission
    $('#visaCheckForm').on('submit', function (e) {
        e.preventDefault();

        // Collect form data
        var formData = $(this).serialize();

        // Send data to the server using AJAX
        $.ajax({
            type: "POST",
            url: "path/to/visa_check_backend.php", // Update with your actual backend URL
            data: formData,
            success: function (response) {
                // Display the visa status result
                $('#visaCheckResult').html('<p class="text-light">Visa Status: ' + response + '</p>');
            },
            error: function (error) {
                // Handle errors
                console.log(error);
            }
        });
    });
});
