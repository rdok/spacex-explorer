### Development
> Source aliases. `source aliases`
>
Only depedency: docker & docker-compose

##### Examples
```
docker-compose-app up -d

# These aliases connect to the php & db docker services
php artisan migrate
php artisan migrate --env=testing
mysql -uroot -psecret
```

**Test**
```
php ./vendor/bin/phpunit
```

