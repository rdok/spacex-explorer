### Development
> Source aliases to create an alias for the docker-compose. 
>
Only depedency: docker & docker-compose

##### Workbench
```
workbench up -d 

workbench exec php php artisan migrate
workbench exec php php artisan migrate --env=testing
```

**Test**
```
workbench exec php ./vendor/bin/phpunit
```

