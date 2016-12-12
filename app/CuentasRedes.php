<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Laravel\Socialite\Contracts\User as ProviderUser;


class CuentasRedes extends Model
{
    protected  $fillable = ['user_id', 'proveedor_id', 'proveedor'];
    private $account;
    
    public function iniciar(ProviderUser $providerData){
    	
    	$this->account = CuentasRedes::whereProveedor('facebook')
    	->whereProveedorId($providerData->getId())
    	->first();
    	
    }
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
    /**
     * ccdaza
     * create 12/12/16
     * modification 12/12/16
     * @return object
     */
    public function getUser(){
    	
    	return $this->account;
    	
    }
    
    /**
     * ccdaza
     * create 12/12/16
     * modification 12/12/16
     * @return boolean
     **/
    public function existsUser(){
    	
    	if ($this->account) {
    		
    		return true;
    	} else {
    		
    		return  false;
    		
    	}
    	
    }
    
}
