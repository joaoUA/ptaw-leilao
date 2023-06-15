const axios = require('axios');
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const Echo = require('laravel-echo').default;
const Pusher = require('pusher-js');
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '9422ffd59d7ee0bfbd45',
    cluster: 'eu',
    forceTLS: true,
    authEndpoint: '/broadcasting/auth',
    auth: {
        headers: {
            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    },
})