#!/bin/bash

docker_compose() {
    docker-compose \
        --project-directory "${WORKSPACE}" \
        --project-name "${PROJECT_NAME}" \
        --file docker/docker-compose.yml \
        "$@"
}
