<?php
 
use Styde\Seeder\BaseSeeder;
 
class DatabaseSeeder extends BaseSeeder
{
    protected $truncate = array(
        'roles','users', 'categories'
    );
 
    protected $seeders = array(
        'Role','User', 'Category'
    );
}