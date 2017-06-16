#!/bin/bash

git pull
#php artisan migrate:rollback
mysql -u root -ptoor -e "drop database bancodetiempo; create database bancodetiempo;"
php artisan migrate --seed
gulp

while true; do
    read -p "Do you wish to install this program? " yn
    case $yn in
        [Yy]* ) mysql -u root -ptoor -f bancodetiempo < dummy-data.sql;exit;;
        [Nn]* ) exit;;
        * ) echo "Yes or no? ";;
    esac
done
