import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'hyt1zndukpvh2kywkckh', // must match BROADCAST_DRIVER key in .env
    wsHost: window.location.hostname,   // usually localhost or 127.0.0.1
    wsPort: 8080,                        // your WebSocket port
    wssPort: 8080,                       // if using SSL
    forceTLS: false,
    encrypted: false,
    disableStats: true,
    enabledTransports: ['ws', 'wss'],   // only use local WebSocket, not hosted
    cluster: '',                          // empty string instead of null
});
