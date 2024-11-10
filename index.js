// Function to validate appointment date
function validateAppointmentDate() {
    var appointmentDate = document.getElementById('appointmentDate').value;
    var currentTime = new Date();
    var selectedTime = new Date(appointmentDate);

    // Compare appointment date with current date
    if (selectedTime <= currentTime) {
        alert("La date doit être ultérieure à la date actuelle.");
        return false;
    }
    return true;
}

// Event listener for form submission
document.getElementById('appointmentForm').addEventListener('submit', function(event) {
    if (!validateAppointmentDate()) {
        event.preventDefault(); // Prevent form submission if date is not valid
    }
});



// highlight current day on opeining hours
$(document).ready(function() {
    $('.opening-hours li').eq(new Date().getDay()).addClass('today');
    });


    $(document).ready(function() {
        $('.nav-link').click(function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        });
    });
    




