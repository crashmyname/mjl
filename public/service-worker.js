const CACHE_NAME = "app-cache-v1";
const baseURL = self.location.origin;
const urlsToCache = [
  `${baseURL}/`,
  `${baseURL}/public/css/style.css`,
  `${baseURL}/public/js/script.js`,
  `${baseURL}/public/documents/logomjl192.png`,
  `${baseURL}/public/documents/logomjl512.png`
];

self.addEventListener("install", (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => {
      return cache.addAll(urlsToCache);
    })
  );
});

self.addEventListener("fetch", (event) => {
  event.respondWith(
    caches.match(event.request).then((response) => {
      return response || fetch(event.request);
    })
  );
});
