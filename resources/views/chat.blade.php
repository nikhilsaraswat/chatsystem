<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusher Chat</title>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
            cluster: '{{ env("PUSHER_APP_CLUSTER") }}'
        });

        var channel = pusher.subscribe('chat-channel');
        channel.bind('App\\Events\\MessageSent', function(data) {
            console.log('Received message:', data.message); // Debugging line
            appendMessage(data.message);
        });

        function sendMessage() {
            var message = document.getElementById('message').value;
            axios.post('/send-message', {
                message: message
            })
            .then(function (response) {
                console.log(response.data);
            })
            .catch(function (error) {
                console.log(error);
            });
        }

        function appendMessage(message) {
            var messagesContainer = document.getElementById('messages');
            var messageElement = document.createElement('div');
            messageElement.innerText = message;
            messagesContainer.appendChild(messageElement);
        }
    </script>
</head>
<body>
    <h1>Pusher Chat</h1>
    <div id="messages" style="border: 1px solid #000; height: 300px; overflow-y: scroll;"></div>
    <input type="text" id="message" placeholder="Type your message">
    <button onclick="sendMessage()">Send</button>
</body>
</html>
