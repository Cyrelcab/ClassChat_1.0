var timeout;

        // Reset the timer on user activity
        function resetTimer() {
            clearTimeout(timeout);
            timeout = setTimeout(logout, 120000); // 2 minutes (2 * 60 * 1000 milliseconds)
        }

        // Logout function
        function logout() {
            window.location.href = 'logout.php'; // Redirect to logout script
        }

        // Attach the resetTimer function to relevant events (e.g., mousemove, keydown, etc.)
        document.addEventListener('mousemove', resetTimer);
        document.addEventListener('keydown', resetTimer);

        // Initialize the timer on page load
        window.onload = resetTimer;