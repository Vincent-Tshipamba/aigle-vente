import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
window.Pusher = Pusher;


window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '3e6578a9602e62c0f28f',
    cluster: 'mt1',
    forceTLS: true
});

window.Echo.connector.pusher.connection.bind('connected', function() {
    console.log('Connecté à Pusher');
});

window.Echo.connector.pusher.connection.bind('disconnected', function() {
    console.log('Déconnecté de Pusher');
});

window.Echo.channel('user-status-changed')
    .listen('.user-status-changed', () => {
        console.log('UserStatusChanged écouté');
    });
