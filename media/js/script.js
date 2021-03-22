'use strict';

const form = document.querySelector('#message_form');

form.addEventListener('submit', evt => {

  evt.preventDefault();

  const request = fetch('core/add_message.php', {
    method: 'POST',
    body: new FormData(form)
  });

  request
    .then(resp => resp.json())
    .then(json => console.log(json));

});
