#!/bin/bash

docker_compose_app() {
    docker-compose \
      --project-directory "$(pwd)" \
      --project-name 'spacex-explorer' \
      --file docker/docker-compose.yml \
      "$@"
}
docker_compose_local() {
    docker-compose \
      --project-directory "$(pwd)" \
      --project-name 'spacex-explorer' \
      --file docker/docker-compose.yml \
      --file docker/docker-compose.local.yml \
      "$@"
}

php() {
    docker-compose \
      --project-directory "$(pwd)" \
      --project-name 'spacex-explorer' \
      --file docker/docker-compose.yml \
      --file docker/docker-compose.local.yml \
      exec -T php \
      php "$@"
}

composer() {
    docker-compose \
      --project-directory "$(pwd)" \
      --project-name 'spacex-explorer' \
      --file docker/docker-compose.yml \
      --file docker/docker-compose.local.yml \
      exec -T php \
      composer "$@"
}

mysql() {
    docker-compose \
      --project-directory "$(pwd)" \
      --project-name 'spacex-explorer' \
      --file docker/docker-compose.yml \
      --file docker/docker-compose.local.yml \
      exec -T db \
      mysql "$@"
}
