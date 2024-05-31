<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Pusher Chat</title>
</head>
<body>
    @if(session('error'))
    <div class="error-message">
        {{ session('error') }}
    </div>
    @endif
    <h1>Welcome to Pusher Chat</h1>
    <form action="/chat" id="loginForm" method="GET">
        <input type="text" id="username" placeholder="User" name="username" required>
        <input type="password" id="password" placeholder="Key" name="password" required>
        <button type="submit">Chat</button>
    </form>
    
    {{-- <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission
            
            // Get input values
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            
            // Check if username and password match certain values
            if (username == "admin" && password == "password123") {
                // Redirect to /chat if user and password are correct
                window.location.href = "/chat";
            } else {
                // Display error message or prevent navigation
                alert("Username or password is incorrect. Please try again.");
            }
        });
        </script> --}}
</body>
</html>
