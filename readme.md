### Development
> Source aliases. `source aliases`
>
Only depedency: docker & docker-compose

##### Examples
```
docker-compose-app up -d
workbench exec php artisan migrate
workbench exec php artisan migrate --env=testing
```

**Test**
```
workbench php ./vendor/bin/phpunit
```

