#!/usr/bin/env bash

chmod +x ./source/bin/console

docker stop $(docker ps -qf name=hfdemo-) -t 0

docker rm $(docker ps -aqf name=hfdemo-)

docker-compose build

docker-compose up --force-recreate -d

docker-compose exec php /source/bin/console health

