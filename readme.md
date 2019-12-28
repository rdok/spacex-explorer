### Development
Only dependency docker & docker-compose

##### Usage
```
# If your `id -u` is other than 1000 you'll need to update DEV_UID
cp .env.example .env 

source aliases.sh
docker_compose_local up -d

# These aliases connect to the php & db docker services
php artisan migrate
mysql -uroot -psecret
```

**Test**
```
php artisan migrate --env=testing
php ./vendor/bin/phpunit
```

