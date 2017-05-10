<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class HistoryDonations extends Model
{
    protected  $fillable = ['donor_id', 'campaign_id', 'credits'];

    public function donor(){

		return $this->belongsTo(User::class);

	}

    public function campaign(){

		return $this->belongsTo(Campaigns::class);

	}

}
