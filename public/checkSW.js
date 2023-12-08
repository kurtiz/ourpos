window.onload = () => {
  'use strict';

  if ('serviceWorker' in navigator) {
    navigator.serviceWorker
        .register('http://localhost/ourpos/public/sw.js').then(r =>"");
   }
}
