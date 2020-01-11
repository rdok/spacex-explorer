[![Build Status](https://jenkins.rdok.dev/buildStatus/icon?job=spacex-explorer%2Frelease)](https://jenkins.rdok.dev/job/spacex-explorer/job/release/)

### Development
Only dependency docker & docker-compose

##### Install
```
cp .env.example .env 
# Update UID/GID `id -u`/`id -g`

source aliases.sh

docker_compose_dev up -d

docker_compose_dev exec php composer install
docker_compose_dev exec php php artisan migrate
docker_compose_dev exec php php artisan db:seed

docker_compose_dev exec node yarn install
docker_compose_dev exec node yarn run dev

# visit http://localhost:3000
```

##### Test

```
docker_compose_dev exec php php artisan migrate --env=testing
docker_compose_dev exec php ./vendor/bin/phpunit

docker_compose_dev exec dusk php artisan migrate --env=dusk.local
docker_compose_dev exec dusk php artisan dusk:chrome-driver
docker_compose_dev exec dusk php artisan dusk
```

**Database**
`docker_compose_dev exec db mysql -uroot -psecret`
