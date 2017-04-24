#!/bin/bash

php artisan migrate:rollback
php artisan migrate
mysql -u root -ptoor -f bancodetiempo < dummy-data.sql
