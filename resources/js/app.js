import './bootstrap';
import Alpine from 'alpinejs';
// import Echo from 'laravel-echo';
// import Pusher from 'pusher-js';
import collapse from '@alpinejs/collapse';
 
window.Alpine = Alpine;

Alpine.plugin(collapse);
Alpine.start();


// window.Pusher = Pusher;
 
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });