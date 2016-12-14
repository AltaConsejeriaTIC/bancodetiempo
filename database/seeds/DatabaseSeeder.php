<?php
 
use Styde\Seeder\BaseSeeder;
 
class DatabaseSeeder extends BaseSeeder
{
    protected $truncate = array(
        'roles','users',
    );
 
    protected $seeders = array(
        'Role','User',
    );
}