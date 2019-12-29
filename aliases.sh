#!/bin/bash

docker_compose_dev() {
    docker-compose \
        --project-directory "$(pwd)" \
        --project-name 'spacex-explorer' \
        --file docker/docker-compose.yml \
        --file docker/docker-compose.local.yml \
        "$@"
}

dphp() {
    docker_compose_dev exec -T php php "$@"
}

dcomposer() {
    docker_compose_dev exec -T php composer "$@"
}

dmysql() {
    docker_compose_dev exec -T db mysql "$@"
}

dnpm() {
    docker run \
        --rm \
        --name spacex-explorer_npm-dev \
        --volume "/$(pwd)":"/app" \
        --workdir //app \
        --interactive \
        node:8-alpine3.11 npm \
        "$@"
}
