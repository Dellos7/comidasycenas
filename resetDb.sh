#!/bin/bash

echo -n "¿Estás seguro de que quieres resetear la base de datos? (s/n): "
read input
if [ "$input" == "s" ]
then
    sqlDir='sql'
    MYSQL_ROOT_PASSWORD=`grep ^MYSQL_ROOT_PASSWORD .env | cut -d'=' -f2`
    sqlFiles=`ls -1 ${sqlDir} | sort`
    for f in $sqlFiles
    do
        docker exec -i comidasycenas_bbdd-mysql mysql -u root -p$MYSQL_ROOT_PASSWORD --default-character-set=utf8mb4 < "$sqlDir/$f"
    done
fi
