#!/bin/bash

git pull
#php artisan migrate:rollback

read -p "Delete database? " yn
case $yn in
    [Yy]* ) mysql -u root -ptoor -e "drop database bancodetiempo; create database bancodetiempo;";;
esac

php artisan migrate --seed
gulp

read -p "Add dummy-data? " yn
case $yn in
    [Yy]* ) mysql -u root -ptoor -f bancodetiempo < dummy-data.sql;;
esac
