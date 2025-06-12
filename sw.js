const CACHE_NAME = 'portfolio-cache-v1';
const urlsToCache = [
      '/',
      '/assets/users/css/bootstrap.min.css',
      '/assets/users/css/style.css',
      '/assets/users/lib/animate/animate.min.css',
      '/assets/users/lib/owlcarousel/assets/owl.carousel.min.css',
      '/assets/users/js/main.js',
      '/assets/users/js/uigg.js',
      'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css',
      'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css',
      'https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap'
];

self.addEventListener('install', event => {
      event.waitUntil(
            caches.open(CACHE_NAME)
                  .then(cache => {
                        return cache.addAll(urlsToCache);
                  })
      );
});

self.addEventListener('fetch', event => {
      event.respondWith(
            caches.match(event.request)
                  .then(response => {
                        if (response) {
                              return response;
                        }
                        return fetch(event.request)
                              .then(response => {
                                    if (!response || response.status !== 200 || response.type !== 'basic') {
                                          return response;
                                    }
                                    const responseToCache = response.clone();
                                    caches.open(CACHE_NAME)
                                          .then(cache => {
                                                cache.put(event.request, responseToCache);
                                          });
                                    return response;
                              });
                  })
      );
});

self.addEventListener('activate', event => {
      event.waitUntil(
            caches.keys().then(cacheNames => {
                  return Promise.all(
                        cacheNames.map(cacheName => {
                              if (cacheName !== CACHE_NAME) {
                                    return caches.delete(cacheName);
                              }
                        })
                  );
            })
      );
}); 