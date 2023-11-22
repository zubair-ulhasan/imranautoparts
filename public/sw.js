    	self.addEventListener('install', function(event) {
        if ('serviceWorker' in navigator) {
            // Register the service worker
            navigator.serviceWorker.register('/sw.js')
                .then(function (registration) {
                    console.log('Service Worker registered with scope:', registration.scope);
                })
                .catch(function (error) {
                    console.error('Service Worker registration failed:', error);
                });
        }
        });


