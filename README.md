# ULID UTF-8 Bug

Issue around use a Doctrine SQL Filter and ULID fields.

## Installation / Setup

    composer install
    php bin/console doctrine:schema:update --force
    php bin/console doctrine:fixtures:load -n

## Reproduce Issue

1. Serve application
   
        symfony serve
2. Go to [http://127.0.0.1:8000/example](http://127.0.0.1:8000/example)
3. Click on DB profiler
