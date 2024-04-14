document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); 
    fetch("login.php", {
        method: "POST",
        body: new FormData(this)
    })
    .then(response => response.json())
    .then(data => {
        console.log("Response received:", data); // Check response in browser console
        if (data.success) { 
            alert("Login Successful!");
            window.location.href = "petcareServices.html";
        } else {
            alert(data.message);
            // Redirect back to login page if login fails
            window.location.href = "index.html";
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("An error occurred. Please try again later.");
    });
});

