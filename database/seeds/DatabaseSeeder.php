<?php
 
use Styde\Seeder\BaseSeeder;
 	
class DatabaseSeeder extends BaseSeeder
{
    protected $truncate = array(
        'states','roles' ,'network_accounts', 'categories', 'tags', 'attainments','admin_contents', 'fields_reports_admin', 'dynamic_contents'
    );

    protected $seeders = array(
        'State','Role','User', 'NetworkAccounts' , 'Category', 'Tags', 'Attainment' , 'AdminContent', 'BadObservation','TypeReport','FieldsReports', 'DynamicContent'
    );
}
