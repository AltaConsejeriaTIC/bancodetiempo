<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\NetworkAccounts;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function findUsers(Request $request){

        $users = User::select('id', 'first_name', 'last_name', 'avatar', 'email2 as email')->where('role_id', 2)->where('state_id' , 1)->orderBy('first_name');
        $users = $users->get()->toArray();
        $json = [];
        foreach($users as $user){
            $json[$user['id']] = $user;
        }
        print(json_encode($json));

    }

    public function createUser($providerData){
        $account = new NetworkAccounts([
            'provider_id' => $providerData['id'],
            'provider' => $providerData['provider']
        ]);
        $email = is_null($providerData['email']) ? $providerData['id'] . "@cambalachea.co" : $providerData['email'];
        $user = User::create([
                'email' => $email,
                'email2' => $providerData['email'],
                'first_name' => $providerData['first_name'],
                'last_name' => $providerData['last_name'],
                'avatar' => '',
                'state_id' => 1,
                'gender' => $providerData['gender'],
                'birthDate' => $providerData['birthdate'] == '' ? NULL : date("Y-m-d", strtotime($providerData['birthdate'])),
                'aboutMe' => '',
                'role_id' => 2,
                'privacy_policy' => 1
        ]);
        $account->user()->associate($user);
        $account->save();
        $this->setAvatar($user, $providerData['avatar']);
        return $user;
    }

    private function setAvatar($user, $avatar){
        $avatar = $this->getAvatar($avatar, $user);
        if ($avatar) {
            $user->update([
                'avatar' => $avatar
            ]);
        }
    }

    private function getAvatar($url, $user){
        $this->createDirUser($user);
        $img = 'resources/user/user_' . $user->id . '/img' . $user->id . \date('YmdHis') . '.jpg';
        $file = fopen($img, "w+");
        if ($file != false) {
            file_put_contents($img, file_get_contents($url));
            return $img;
        } else {
            return false;
        }
    }

    private function createDirUser($user){
        if (!is_dir('resources/user/user_' . $user->id)) {
            mkdir('resources/user/user_' . $user->id, 0777, true);
        }
    }
}
