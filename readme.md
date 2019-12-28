[![Build Status](https://jenkins.rdok.dev/buildStatus/icon?job=spacex-explorer%2Frelease)](https://jenkins.rdok.dev/job/spacex-explorer/job/release/)

### Development
Only dependency docker & docker-compose

##### Install
```
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

