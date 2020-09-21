window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import EchoLibrary from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new EchoLibrary({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

Echo.private('chat-room.1')
    .listen('ChatMessageWasReceived', (e) => {
        console.log(e.user, e.chatMessage);
    });

// Echo.join('chat-room-presence.1')
//     .here(function (members) {
//         // запускается, когда вы заходите
//         console.table(members);
//     })
//     .joining(function (joiningMember, members) {
//         // запускается, когда входит другой пользователь
//         console.table(joiningMember);
//     })
//     .leaving(function (leavingMember, members) {
//         // запускается, когда выходит другой пользователь
//         console.table(leavingMember);
//     });

// var pusher = new Pusher('9b79a0636b083627350f', {
//     cluster: 'ap1'
// });
//
// var channel = pusher.subscribe('chat-room.1');
//
// channel.bind('ChatEvent', function(data) {
//     alert('An event was triggered with message: ' + data.chatMessage.message);
// });
