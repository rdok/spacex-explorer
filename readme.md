[![Build Status](https://jenkins.rdok.dev/buildStatus/icon?job=spacex-explorer%2Frelease)](https://jenkins.rdok.dev/job/spacex-explorer/job/release/)

### Development
Only dependency docker & docker-compose

##### Install
```
cp .env.example .env 
source aliases.sh
docker_compose_dev up -d
dcomposer install
dphp artisan migrate
dyarn install
dyarn run dev

# visit http://localhost:3000
```

##### Database
`dmysql -uroot -psecret`

**Test**
```
dphp artisan migrate --env=testing
dphp ./vendor/bin/phpunit
ddusk
```

