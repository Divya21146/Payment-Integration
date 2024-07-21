<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Auth Laravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    @include('include.header')
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  <script>
document.addEventListener('DOMContentLoaded', function() {
    const sendBtn = document.getElementById('send-btn');
    const userInput = document.getElementById('user-input');
    const messagesDiv = document.getElementById('messages');

    async function sendMessage(message) {
        const apiKey = 'bnmm'; // Replace with your actual API key
        const apiUrl = 'https://api.groq.com/openai/v1/chat/completions';

        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${apiKey}`,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                messages: [{ role: 'user', content: message }],
                model: 'llama3-8b-8192'
            })
        });

        const data = await response.json();
        return data.choices[0].message.content;
    }

    function appendMessage(role, message) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('message', role);

        const avatarDiv = document.createElement('div');
        avatarDiv.classList.add('avatar');
        avatarDiv.innerText = role === 'user' ? 'U' : 'A';

        const bubbleDiv = document.createElement('div');
        bubbleDiv.classList.add('bubble');
        bubbleDiv.innerText = message;

        messageDiv.appendChild(bubbleDiv);
        messagesDiv.appendChild(messageDiv);
        messageDiv.appendChild(avatarDiv);
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }

    async function handleSendMessage() {
        const userMessage = userInput.value;
        if (userMessage.trim() === '') return;
        
        appendMessage('user', userMessage);
        userInput.value = '';

        const botMessage = await sendMessage(userMessage);
        appendMessage('bot', botMessage);
    }

    sendBtn.addEventListener('click', handleSendMessage);

    userInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            handleSendMessage();
        }
    });
});
</script>
</html>