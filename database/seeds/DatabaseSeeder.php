<?php
 
use Styde\Seeder\BaseSeeder;
 	
class DatabaseSeeder extends BaseSeeder
{
    protected $truncate = array(
        'states','roles', 'users','network_accounts', 'categories', 'tags', 'services', 'tags_services', 'conversations', 'attainments','admin_contents'
    );

    protected $seeders = array(
        'State','Role','User', 'NetworkAccounts' , 'Category', 'Tags',  'Services', 'TagsService', 'Attainment' , 'AdminContent', 'BadObservation','TypeReport','FieldsReports'
    );
}
