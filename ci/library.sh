#!/bin/bash

docker_compose_infrastructure() {
    docker-compose \
        --project-directory "${WORKSPACE}" \
        --file docker/docker-compose.yml \
        "$@"
}

docker_compose_release() {
    docker-compose \
        --project-directory "${WORKSPACE}" \
        --file docker/docker-compose.yml \
        --file docker/docker-compose.production.yml \
        "$@"
}

docker_compose_src() {
    docker-compose \
        --project-directory "${WORKSPACE}" \
        --file docker/src/docker-compose.yml \
        "$@"
}
