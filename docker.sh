#!/bin/bash
CONTAINER_ID="$(docker ps | grep _wordpress_  | awk '{print $1}')"
docker exec -it $CONTAINER_ID docker-php-ext-install pdo_mysql
docker exec -it $CONTAINER_ID /etc/init.d/apache2 reload
