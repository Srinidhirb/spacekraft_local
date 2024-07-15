document.addEventListener("DOMContentLoaded", function() {
    // Simulate a delay to represent content loading
    setTimeout(function() {
        // Hide the loader
        document.getElementById('loader').style.display = 'none';
        
        // Show the main content
        document.getElementById('main-content').style.display = 'block';
    }, 2500); // Adjust the delay as needed
});
