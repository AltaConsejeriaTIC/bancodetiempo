#!/bin/bash

echo -e "\n\nUpdating repository"
git pull

#mysql -u root -ptoor -e "drop database bancodetiempo; create database bancodetiempo;"
echo -e "\n\nUpdating composer dependencies"
composer update
php artisan migrate:rollback
php artisan migrate:refresh --seed



echo -e "\n\nInstalling npm dependencies"
npm install

echo -e "\n\nUpdating js on the web page"
gulp