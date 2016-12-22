<?php
 
use Styde\Seeder\BaseSeeder;
 
class DatabaseSeeder extends BaseSeeder
{
    protected $truncate = array(
        'states','roles','users', 'categories'
    );
 
    protected $seeders = array(
        'State','Role','User', 'Category'
    );
}