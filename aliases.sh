#!/bin/bash

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
    docker_compose_dev exec -T php composer "$@"
}

mysql() {
    docker_compose_dev exec -T db mysql "$@"
}

npm_dev() {
    docker run \
        --rm \
        --name spacex-explorer_npm-dev \
        --volume "/$(pwd)":"/app" \
        --workdir //app \
        --interactive \
        node:8-alpine3.11 npm \
        "$@"
}
