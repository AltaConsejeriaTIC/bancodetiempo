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

class NetworkAccountsController extends Controller
{
    public function login($provider = '')
    {

        if (!$provider || $provider == '') {
            return Redirect::route("login");
        }
        Session::put('last_url', str_replace("http://" . $_SERVER['HTTP_HOST'], "", URL::previous()));
        $function = "redirect" . ucwords($provider);
        return $this->$function();

    }

    public function validateLogout()
    {
        if (auth()->user()) {
            auth()->logout();
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function createUser($providerData)
    {

        $account = new NetworkAccounts([
            'provider_id' => $providerData['id'],
            'provider' => $providerData['provider']
        ]);

        $email = is_null($providerData['email']) ? $providerData['id'] . "@cambalachea.co" : $providerData['email'];

        $user = User::whereEmail($email)->first();

        if (!$user) {

            $user = User::create([
                'email' => $email,
                'email2' => $providerData['email'],
                'first_name' => $providerData['first_name'],
                'last_name' => $providerData['last_name'],
                'avatar' => '',
                'state_id' => 4,
                'gender' => $providerData['gender'],
                'birthDate' => $providerData['birthdate'] == '' ? NULL : date("Y-m-d", strtotime($providerData['birthdate'])),
                'aboutMe' => '',
                'role_id' => 2
            ]);

            $account->user()->associate($user);
            $account->save();
            $this->setAvatar($user, $providerData['avatar']);
        }

        return true;

    }

    private function setAvatar($user, $avatar){
        $avatar = $this->getAvatar($avatar);
        if ($avatar) {
            $user->update([
                'avatar' => $avatar
            ]);
        }
    }


    public function getAvatar($url)
    {
        if (!is_dir('resources/user/user_' . Auth::id())) {
            mkdir('resources/user/user_' . Auth::id(), 0777, true);
        }
        $img = 'resources/user/user_' . Auth::id() . '/img' . Auth::id() . \date('YmdHis') . '.jpg';
        $file = fopen($img, "w+");
        if ($file != false) {
            file_put_contents($img, file_get_contents($url));
            return $img;
        } else {
            return false;
        }

    }

    public function callback($provider)
    {

        if (!$provider || $provider == '' || Input::get("error")) {
            return Redirect::route("login", array('message' => "Error en la autenticaci&ntilde;n"));
        }

        $function = "getProviderData" . ucwords($provider);

        $providerData = $this->$function();

        $networkAccounts = new NetworkAccounts();

        $networkAccounts->start($providerData);

        if ($networkAccounts->existsUser()) {

            Session()->put('GAEvent', ['event' => 'login', 'provider' => $provider]);

            Auth()->login($networkAccounts->getUser());

            return Redirect::to(Session::get('last_url'));


        } else {

            if ($this->createUser($providerData)) {

                $networkAccounts->start($providerData);

                Auth()->login($networkAccounts->getUser());

                return redirect('register');

            }

        }

    }

    private function redirectFacebook()
    {

        return Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
        ])->scopes([
            'email', 'user_birthday'
        ])->redirect();

    }

    private function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    private function redirectLinkedin()
    {
        return Socialite::driver('linkedin')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
        ])->redirect();
    }

    private function getProviderDataFacebook()
    {

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

    private function getProviderDataGoogle()
    {

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

    private function getProviderDataLinkedin()
    {

        $providerData = Socialite::driver("linkedin")->user();

        $newProviderData = [
            "first_name" => isset($providerData->getRaw()["firstName"]) ? $providerData->getRaw()["firstName"] : "",
            "last_name" => isset($providerData->getRaw()["lastName"]) ? $providerData->getRaw()["lastName"] : "",
            "email" => $providerData->getEmail(),
            "birthdate" => isset($providerData->getRaw()["birthday"]) ? $providerData->getRaw()["birthday"] : "",
            "gender" => isset($providerData->getRaw()["gender"]) ? $providerData->getRaw()["gender"] : "",
            "id" => $providerData->getId(),
            "provider" => "linkedin",
            "avatar" => $providerData->avatar_original

        ];

        return $newProviderData;

    }
}
