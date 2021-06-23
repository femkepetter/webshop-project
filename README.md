# A Webshop in Laravel

## Installation Laravel and database
- composer install
- create a database (and user) with name of your choice
- rename .env.example to .env
- set database credentials in your .env file
- php artisan migrate:fresh --seed

## Install Bootstrap UI and authentication
- composer require laravel/ui
- php artisan ui bootstrap
- php artisan ui bootstrap --auth
- npm install
- npm run dev (follow npm instructions in your terminal)

## CSS & JS
- CSS and JavaScript goes in the resources folder
- npm run watch
- every time you edit CSS or JS: npm run watch
