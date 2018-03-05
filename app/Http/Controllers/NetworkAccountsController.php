<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use App\Models\NetworkAccounts;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use JavaScript;
use Illuminate\Support\Facades\Session;

class NetworkAccountsController extends Controller{

    static function redirectFacebook(){
        return Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
        ])->scopes([
            'email', 'user_birthday'
        ])->redirect();
    }
    static function redirectGoogle(){
        return Socialite::driver('google')->redirect();
    }
    static function redirectLinkedin(){
        return Socialite::driver('linkedin')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
        ])->redirect();
    }
    static function getProviderDataFacebook(){
        $providerData = Socialite::driver("facebook")->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
        ])->user();
        $newProviderData = [
            "first_name" => isset($providerData->getRaw()["first_name"]) ? $providerData->getRaw()["first_name"] : "",
            "last_name" => isset($providerData->getRaw()["last_name"]) ? $providerData->getRaw()["last_name"] : "",
            "email" => $providerData->getEmail(),
            "birthdate" => isset($providerData->getRaw()["birthday"]) ? $providerData->getRaw()["birthday"] : "",
            "gender" => isset($providerData->getRaw()["gender"]) ? $providerData->getRaw()["gender"] : "",
            "id" => $providerData->getId(),
            "provider" => "facebook",
            "avatar" => $providerData->avatar_original

        ];
        return $newProviderData;
    }
    static function getProviderDataGoogle(){
        $providerData = Socialite::driver("google")->user();
        $newProviderData = [
            "first_name" => isset($providerData->getRaw()["name"]["givenName"]) ? $providerData->getRaw()["name"]["givenName"] : "",
            "last_name" => isset($providerData->getRaw()["name"]["familyName"]) ? $providerData->getRaw()["name"]["familyName"] : "",
            "email" => $providerData->getEmail(),
            "birthdate" => "",
            "gender" => isset($providerData->getRaw()["gender"]) ? $providerData->getRaw()["gender"] : "",
            "id" => $providerData->getId(),
            "provider" => "google",
            "avatar" => $providerData->avatar_original
        ];
        return $newProviderData;
    }
    static function getProviderDataLinkedin(){
        $providerData = Socialite::driver("linkedin")->user();

        $newProviderData = [
            "first_name" => isset($providerData->getRaw()["firstName"]) ? $providerData->getRaw()["firstName"] : "",
            "last_name" => isset($providerData->getRaw()["lastName"]) ? $providerData->getRaw()["lastName"] : "",
            "email" => $providerData->getEmail(),
            "birthdate" => isset($providerData->getRaw()["birthday"]) ? $providerData->getRaw()["birthday"] : "",
            "gender" => isset($providerData->getRaw()["gender"]) ? $providerData->getRaw()["gender"] : "",
            "id" => $providerData->getId(),
            "provider" => "linkedin",
            "avatar" => $providerData->avatar
        ];
        return $newProviderData;
    }
}
