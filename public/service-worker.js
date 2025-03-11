const CACHE_NAME = "app-cache-v1";
const urlsToCache = [
  "/",
  "/public/css/style.css",
  "/public/js/script.js",
  "/public/documents/logomjl192.png",
  "/public/documents/logomjl512.png"
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
