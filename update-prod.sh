#!/bin/bash

git pull
mysql -u root -ptoor -e "drop database bancodetiempo; create database bancodetiempo;"
#php artisan migrate:rollback
php artisan migrate --seed
gulp
