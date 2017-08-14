<?php
 
use Styde\Seeder\BaseSeeder;
 	
class DatabaseSeeder extends BaseSeeder
{
    protected $truncate = array(
        'states','roles' ,'network_accounts', 'attainments', 'bad_observations', 'type_reports', 'fields_reports_admin'
    );

    protected $seeders = array(
        'State','Role','User', 'NetworkAccounts' , 'Category', 'Attainment' , 'AdminContent', 'BadObservation','TypeReport','FieldsReports', 'DynamicContent'
    );
}
