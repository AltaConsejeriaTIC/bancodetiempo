#!/bin/bash

#php artisan migrate:rollback
mysql -u root -ptoor -e "drop database bancodetiempo; create database bancodetiempo;"
php artisan migrate
mysql -u root -ptoor -f bancodetiempo < dummy-data.sql
