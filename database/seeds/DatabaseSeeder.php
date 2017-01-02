<?php
 
use Styde\Seeder\BaseSeeder;
 
class DatabaseSeeder extends BaseSeeder
{
    protected $truncate = array(
        'states','roles','users', 'categories', 'services'
    );
 
    protected $seeders = array(
        'State','Role','User', 'Category', 'Services'
    );
}