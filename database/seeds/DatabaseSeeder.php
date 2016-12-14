<?php
 
use Styde\Seeder\BaseSeeder;
 
class DatabaseSeeder extends BaseSeeder
{
    protected $truncate = array(
        'roles',
    );
 
    protected $seeders = array(
        'Role',
    );
}