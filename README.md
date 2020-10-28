# Job manager api, created with Laravel 8

## Minimum Requirements

- **PHP 7.3**
- **[Composer](https://getcomposer.org/)**

## Instalation

- After download the repository, install the libraries:

```
composer install
```

- Next, init the enviroment file:

```
php artisan init
```

- After that, configure your database, in the .env file.

- Then run the migrations and passport installation:

```
php artisan migrate
php artisan passport:install
```

Done. Now you can run the api server.
