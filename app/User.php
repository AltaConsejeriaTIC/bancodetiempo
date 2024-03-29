<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Conversations;
use App\Models\State;
use App\Models\Role;
use App\Models\InterestUser;
use App\Models\Message;
use App\Models\AttainmentUsers;
use App\Models\UserScore;
use App\Models\Groups;
use App\Models\NetworkAccounts;
use App\Models\TokensPush;
use App\Models\ColegioUsuario;
use App\Models\CampaignParticipants;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'email2', 
        'password', 
        'avatar', 
        'state_id', 
        'gender', 
        'credits', 
        'birthDate', 
        'aboutMe', 
        'role_id', 
        'privacy_policy', 
        'ranking', 
        'document', 
        'course',
        'group',
        'plataforma'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function networkAccount()
    {
        return $this->belongsTo(NetworkAccounts::class, 'user_id', 'id');
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
    
    public function tokens()
    {
        return $this->hasMany(TokensPush::class);
    }
    
    public function groups()
    {
       	return $this->hasMany(Groups::class, 'admin_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function interests()
    {

        return $this->hasMany(InterestUser::class);

    }

    public function conversations()
    {

        return $this->hasMany(conversations::class, "applicant_id", "id");

    }

    public function user_score()
    {
        return $this->hasMany(UserScore::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function attainmentUsers()
    {
        return $this->hasMany(AttainmentUsers::class);
    }

    public function reports()
    {

        return $this->hasMany(Reports::class);

    }
    
    public function campaignParticipants(){
        return $this->hasMany(CampaignParticipants::class, "participant_id", "id");
    }
    
    public function colegioUsuario()
    {
        return $this->belongsTo(ColegioUsuario::class, "id", "user_id");
    }
    
    public function colegio(){
        return $this->ColegioUsuario->colegio;
    }
    
    public function setBirthDateAttribute($value){
        $this->attributes['birthDate'] = date("Y-m-d", strtotime($value));
    }

    static function recommendedServices()
    {
        if (Auth::check()) {
            $allServices = Service::select('services.*')
                ->join('users', 'users.id', '=', 'services.user_id')
                ->where('services.state_id', 1)
                ->where('users.state_id', 1)
                ->whereIn("category_id", Auth::User()->interests)
                ->orderBy("created_at", "desc")->paginate(6);
            return $allServices;
        } else {
            return [];
        }
    }

    static function setRanking($user)
    {

        $user = User::find($user);

        if ($user->user_score->count() > 0) {

            $sum = 0;

            foreach ($user->user_score as $score) {
                $sum += $score->score;
            }

            $ranking = $sum / $user->user_score->count();
            
            $user->update([
                "ranking" => $ranking
            ]);

        }

    }

    static function filter($filter)
    {
        return User::where('first_name', 'LIKE', "%$filter%")->orWhere('last_name', 'LIKE', "%$filter%");
    }

}
