#!/bin/bash

docker_compose_app() {
    docker-compose \
        --project-directory "$(pwd)" \
        --project-name 'spacex-explorer' \
        --file docker/docker-compose.yml \
        "$@"
}
docker_compose_dev() {
    docker-compose \
        --project-directory "$(pwd)" \
        --project-name 'spacex-explorer' \
        --file docker/docker-compose.yml \
        --file docker/docker-compose.local.yml \
        "$@"
}

php() {
    docker_compose_dev exec -T php php "$@"
}

composer() {
    docker-compose_dev exec -T php composer "$@"
}

mysql() {
    docker-compose_dev exec -T db mysql "$@"
}

npm_dev() {
    docker run --rm -i -v "/$(pwd)":"/app" -w //app node:8-alpine3.11 npm "$@"
}
