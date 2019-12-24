[![Build Status](https://jenkins.rdok.dev/buildStatus/icon?job=spacex-explorer%2Fstatus-check)](https://jenkins.rdok.dev/job/spacex-explorer/job/status-check/)

### Development
Only depedency docker & docker-compose


##### Usage
```
# If your `id -u` is other than 1000 you'll need to update DEV_UID
cp .env.example .env 

source aliases
docker-compose-app build
docker-compose-local up -d

# These aliases connect to the php & db docker services
php artisan migrate
php artisan migrate --env=testing
mysql -uroot -psecret
```

**Test**
```
php ./vendor/bin/phpunit
```

