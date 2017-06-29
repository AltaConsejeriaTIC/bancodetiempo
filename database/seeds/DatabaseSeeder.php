<?php
 
use Styde\Seeder\BaseSeeder;
 	
class DatabaseSeeder extends BaseSeeder
{
    protected $truncate = array(
        'states','roles' ,'network_accounts', 'categories', 'attainments','admin_contents', 'bad_observations', 'type_reports', 'fields_reports_admin', 'dynamic_contents'
    );

    protected $seeders = array(
        'State','Role','User', 'NetworkAccounts' , 'Category', 'Attainment' , 'AdminContent', 'BadObservation','TypeReport','FieldsReports', 'DynamicContent'
    );
}
