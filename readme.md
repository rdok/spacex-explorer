[![Build Status](https://jenkins.rdok.dev/buildStatus/icon?job=spacex-explorer%2Fstatus-check)](https://jenkins.rdok.dev/job/spacex-explorer/job/status-check/)

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

