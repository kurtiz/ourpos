// window.onload = () => {
//   'use strict';
//
//   if ('serviceWorker' in navigator) {
//     navigator.serviceWorker
//         .register('http://localhost/myci4/sw.js').then(r =>"");
//    }
// }


if (navigator.serviceWorker) {
    navigator.serviceWorker.register('/sw.js').then(function(registration) {
        console.log('ServiceWorker registration successful with scope:',  registration.scope);
    }).catch(function(error) {
        console.log('ServiceWorker registration failed:', error);
    });
}