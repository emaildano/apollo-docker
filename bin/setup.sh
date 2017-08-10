#!/bin/bash

rm wordpress/composer.lock
docker-compose exec --user root phpfpm composer create-project
