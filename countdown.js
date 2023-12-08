// Set the countdown time in seconds
var countdownTime = 60;
var codeExpired = false;

// Function to update the countdown
function updateCountdown() {
    var minutes = Math.floor(countdownTime / 60);
    var seconds = countdownTime % 60;

    // Display the time in the format mm:ss
    var formattedTime = minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

    // Update the countdown element
    document.getElementById('countdown').style.color = 'white';
    document.getElementById('countdown').innerText = formattedTime;

    // Decrease the countdown time by 1 second
    countdownTime--;

    // Check if the countdown has reached 0
    if (countdownTime < 0) {
        codeExpired = true;
        // Perform any actions when the countdown reaches 0
        document.getElementById('countdown').style.color = 'red';
        document.getElementById('countdown').innerText = 'Verification Code Expired!';

        // Disable the submit button or take any other actions
        document.getElementById('submitBtn').disabled = true;
    } else {
        // Call the function again after 1 second
        setTimeout(updateCountdown, 1000);
    }
}

// Call the updateCountdown function to start the countdown
updateCountdown();