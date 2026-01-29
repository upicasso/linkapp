#!/bin/bash

set -e

docker compose -f docker/docker-compose.yml build
docker compose -f docker/docker-compose.yml up -d

if [ -d "./app/var" ]; then
  sudo chmod -R 777 ./app/var
fi