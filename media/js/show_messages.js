'use strict';

const messages = document.querySelector('#messages');

getMessages();

setInterval(getMessages, 1000); // Update message feed every 5 seconds

function getMessages() {

  const request = fetch('core/get_messages.php');

  request
    .then(resp => resp.json())
    .then(msgs  => showMessages(msgs));

}

function showMessages(msgs) {

  messages.innerHTML = '';

  msgs.forEach(msg => {

    let message = document.createElement('div');
    message.className = 'message';

    message.innerHTML = `<p class='content'>${msg['content']}</p>
                         <span class='author'>${msg['author']}</span>
                         <time class='date'>${msg['date']}</time>`;

    messages.append(message);

  });

}
