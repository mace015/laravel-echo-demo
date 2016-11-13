# Laravel Echo Demo

This is a small demo application to demo the use of Laravel Echo in comibation with a local Node.js server that pushes the messages to client with Socket.io.

With this setup, you can use Laravel Echo without using, and thus being dependant on, a third party provider like Pusher.

## Installation and use

In order to get this demo appication to work, use the following steps;

    * Compile the app.js file with gulp => `gulp`.
    * Install all depancies with composer and NPM => `composer install && npm install`.
    * Migrate the database => `php artisan migrate`.
    * Install laravel-echo-server => `npm install -g laravel-echo-server`.
    * Run the laravel-echo-server from the applications directory => `laravel-echo-server start`.
    * Run a queue worker => `php artisan queue:work --daemon --sleep=1`.

NOTE: If the domain you use for this test is not echo-demo.dev, please change the settings in `resources/assets/js/bootstrap.js` and `./laravel-echo-server.json`.
