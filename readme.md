### Development
Only dependency docker & docker-compose

##### Install
```
# If your `id -u` is other than 1000 you'll need to update DEV_UID
cp .env.example .env 

source aliases.sh

docker_compose_dev up -d
php artisan migrate
npm_dev install

# visit http://localhost:3000
```

**Test**
```
php artisan migrate --env=testing
php ./vendor/bin/phpunit
```

