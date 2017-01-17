<?php
 
use Styde\Seeder\BaseSeeder;
 
class DatabaseSeeder extends BaseSeeder
{
    protected $truncate = array(
        'states','roles', 'users','network_accounts', 'categories', 'services'
    );

    protected $seeders = array(
        'State','Role','User', 'NetworkAccounts' , 'Category', 'Services'
    );
}