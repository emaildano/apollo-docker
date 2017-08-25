#!/bin/bash

if [ -f "./public/composer.lock" ];
then
	echo "Running composer update..."
  docker-compose exec --user root phpfpm composer update
else
	echo "Running composer create-project..."
	docker-compose exec --user root phpfpm composer create-project
fi
