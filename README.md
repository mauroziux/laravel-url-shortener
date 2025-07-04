
![](https://github.com/arietimmerman/laravel-url-shortener/workflows/CI/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/arietimmerman/laravel-url-shortener/v/stable)](https://packagist.org/packages/arietimmerman/laravel-url-shortener)
[![Total Downloads](https://poser.pugx.org/arietimmerman/laravel-url-shortener/downloads)](https://packagist.org/packages/arietimmerman/laravel-url-shortener)

A minimal Laravel package for shortening URLs. Apart for creating short URLs - like bitly - it also supported updating URL redirects and tracking URL clicks.

# Laravel URL Shortener

Install the package. It supports Laravel 9.0, 10.0, and 11.0.

~~~
composer require arietimmerman/laravel-url-shortener
php artisan migrate
~~~

And start shortening URLs

~~~.php
(string)URLShortener::shorten("http://www.example.com");
~~~

Or

~~~.bash
php artisan url:shorten http://www.example.com
~~~

## Requirements

- PHP 8.1 or higher
- Laravel 9.0, 10.0, or 11.0

## Optional

Publish the configuration and the view.

~~~.php
php artisan vendor:publish --provider="ArieTimmerman\Laravel\URLShortener\ServiceProvider"
~~~

Optionally, register for URLVisit events in your `EventServiceProvider`.

~~~.php
protected $listen = [
	'ArieTimmerman\Laravel\URLShortener\Events\URLVisit' => [
		'App\Listener\YourListener',
	]
];
~~~

## Configuration

See `config/urlshortener.php`

## Docker

Build and start the docker container.

~~~
docker-compose build
docker-compose up
~~~

Now shorten an URL like this

~~~
docker-compose exec laravel-url-shortener php artisan url:shorten https://www.example.com
~~~

Check out the redirect

~~~
curl -v http://localhost:18123/code
~~~
