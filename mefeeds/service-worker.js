// check if Service Worker support exists in browser or not
if( 'serviceWorker' in navigator ) {//Service Worker support exists
    navigator.serviceWorker
     .register( '/mejobsphuket/service-worker.js' , { scope : ' ' } )
     .then( function( ) {
         console.log('Congratulations!!Service Worker Registered');
     })
     .catch( function( err) {
         console.log(`Aagh! Some kind of Error :- ${err}`);
     });
} else {//still not supported
    // alert("not support");
}


var log = console.log.bind(console);//bind our console to a variable
var version = "0.0.2";
var cacheName = "sw-demo";
var cache = cacheName + "-" + version;
var filesToCache = [
                    'public/mui-0.9.20/css/mui.min.css',
                    'public/font-awesome-4.7.0/css/font-awesome.min.css',
                    'public/pure-release-1.0.0/pure-min.css',
                    "public/jquery/dist/jquery.min.js",
                    "public/mui-0.9.20/js/mui.js",
                    "public/countdownjs/countdown.min.js",
                    "/service-worker.js",
                 ];

//Add event listener for install
self.addEventListener("install", function(event) {
    log('[ServiceWorker] Installing....');
    event.waitUntil(caches
                        .open(cache)//open this cache from caches and it will return a Promise
                        .then(function(cache) { //catch that promise
                            log('[ServiceWorker] Caching files');
                            cache.addAll(filesToCache);//add all required files to cache it also returns a Promise
                        })
                    );
});

//Add event listener for fetch
self.addEventListener("fetch", function(event) {
    //note that event.request.url gives URL of the request so you could also intercept the request and send a response based on your URL
    //e.g. you make want to send gif if anything in jpeg form is requested.
    event.respondWith(//it either takes a Response object as a parameter or a promise that resolves to a Response object
                        caches.match(event.request)//If there is a match in the cache of this request object
                            .then(function(response) {
                                if(response) {
                                    log("Fulfilling "+event.request.url+" from cache.");
                                    //returning response object
                                    return response;
                                } else {
                                    log(event.request.url+" not found in cache fetching from network.");
                                    //return promise that resolves to Response object
                                    return fetch(event.request);
                                }
                            })
                    );
});

self.addEventListener('activate', function(event) {
  log('[ServiceWorker] Activate');
  event.waitUntil(
                    caches.keys()//it will return all the keys in the cache as an array
                    .then(function(keyList) {
                            //run everything in parallel using Promise.all()
                            Promise.all(keyList.map(function(key) {
                                    if (key !== cacheName) {
                                        log('[ServiceWorker] Removing old cache ', key);
                                        //if key doesn`t matches with present key
                                        return caches.delete(key);
                                    }
                                })
                            );
                        })
                );
});
