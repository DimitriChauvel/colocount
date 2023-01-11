#!/bin/bash
if [[ $1 == "prod" || $1 == "dev" ]] && [[ $2 == "down" || $2 == "up" ]]; then
  cd ..
  fileEnv="docker-compose.${1}.yml"
  downOrUp=$2
  echo "Running docker compose -f docker-compose.yml -f $fileEnv $downOrUp"
  docker compose -f docker-compose.yml -f $fileEnv $downOrUp
else
  echo "Need to follow format ./deploy.sh [prod|dev] [down|up]"
fi
