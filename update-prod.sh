#!/bin/bash

git pull
#php artisan migrate:rollback
mysql -u root -ptoor -e "drop database bancodetiempo; create database bancodetiempo;"
php artisan migrate
gulp
