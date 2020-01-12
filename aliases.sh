#!/bin/bash

PROJECT_NAME='spacex-explorer'

docker_compose_dev() {
  docker-compose \
    --project-directory "$(pwd)" \
    --project-name "${PROJECT_NAME}" \
    --file docker/docker-compose.yml \
    --file docker/docker-compose.local.yml \
    "$@"
}

dp() { # docker php
  docker_compose_dev exec php "$@"
}

dpt() { # docker phpunit
  docker_compose_dev exec php ./vendor/bin/phpunit "$@"
}

da() { # docker php artisan
  docker_compose_dev exec php php artisan "$@"
}
