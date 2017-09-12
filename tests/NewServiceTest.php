<?php

use App\Models\AttainmentUsers;
use App\Models\Service;
use App\Models\TagsService;
use App\Models\Conversations;
use App\Models\Group_collaborators;
use App\Models\Groups;
use App\Models\CampaignParticipants;
use App\Models\Campaigns;
use App\Models\HistoryDonations;
use App\Models\UserScore;
use App\Models\NetworkAccounts;
use App\Models\Deal;
use App\Models\DealState;
use App\Models\ServiceScore;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewServiceTest extends TestCase
{
    public function testCreateService()
    {
        $this->deleteAllServices();
        $this->deleteAllUser();
        $user = $this->createTestUser();
        $this->login($user);

        $this->post('/service/save', ['serviceName' => 'pruebaXXXXX',
            'descriptionService' => 'prueba prueba prueba prueba prueba prueba prueba prueba prueba',
            'modalityServicePresently' => 1,
            'valueService' => 2,
            'categoryService' => 2,
            'tagService' => 'est']);

        $service = Service::all()->last();
        $this->assertTrue($service->name == 'pruebaXXXXX');

        $tag = tag::all();
        $this->assertTrue($tag->count() > 0);
        $this->assertTrue($tag->last()->tag == 'est');
    }

    public function testGetService()
    {
        $this->deleteAllServices();
        $this->deleteAllUser();
        $user = $this->createTestUser();
        $service = $this->createTestService($user);
        $response = $this->call('GET', '/service/' . $service->id);

        $this->assertEquals(200, $response->status());

    }

    public function testEditService()
    {
        $this->deleteAllServices();
        $this->deleteAllUser();
        $user = $this->createTestUser();
        $this->login($user);
        $service = $this->createTestService($user);


        $this->put('/service/save/' . $service->id, ['serviceName' => 'pruebaXXXXXEditada',
            'descriptionService' => 'prueba prueba prueba prueba prueba prueba prueba prueba prueba',
            'modalityServicePresently' => 1,
            'valueService' => 2,
            'categoryService' => 2,
            'tagService' => 'est']);

        $service = Service::find($service->id);

        $this->assertTrue($service->name == 'pruebaXXXXXEditada');
    }

    public function testDeleteService()
    {
        $this->deleteAllServices();
        $this->deleteAllUser();
        $user = $this->createTestUser();
        $this->login($user);
        $this->createTestService($user);
        $service = $this->createTestService($user);

        $this->get('/serviceDelete/' . $service->id);

        $this->assertTrue(Service::find($service->id) == null);
    }

    public function login($user)
    {
        Auth()->login($user);
        $this->assertTrue(Auth::check());
    }

    public function createTestService($user)
    {
        return Service::create([
            'name' => 'Service',
            'description' => 'prueba prueba prueba prueba prueba prueba prueba prueba prueba',
            'presently' => 1,
            'image' => 'sadsa',
            'virtually' => 0,
            'value' => 2,
            'category_id' => 2,
            'state_id' => 1,
            'user_id' => $user->id
        ]);
    }


    public function createTestUser()
    {
        return User::create([
            'first_name' => 'user@user.com', 'last_name' => 'user@user.com', 'email' => 'user@usertest.com', 'email2' => 'user@usertest.com', 'password' => 'user@user.com',
            'avatar', 'state_id' => 1, 'gender' => 'user@user.com', 'credits', 'birthDate', 'aboutMe' => 'user@user.com', 'role_id' => 2, 'privacy_policy', 'ranking' => 0
        ]);
    }


    public function deleteAllUser()
    {
        AttainmentUsers::where('id', '>', 0)->delete();
        Group_collaborators::where('id', '>', 0)->delete();
        Groups::where('id', '>', 0)->delete();
        CampaignParticipants::where('id', '>', 0)->delete();
        HistoryDonations::where('id', '>', 0)->delete();
        NetworkAccounts::where('id', '>', 0)->delete();
        Campaigns::where('id', '>', 0)->delete();
        UserScore::where('id', ">", 0)->delete();
        User::where('role_id', '!=', 1)->delete();
    }

    public function deleteAllServices()
    {
        TagsService::where('id', '>', 0)->delete();

        DealState::where('id', '>', 0)->delete();
        Deal::where('id', '>', 0)->delete();
        Conversations::where('id', '>', 0)->delete();
        ServiceScore::where('service_id', '>', 0)->delete();
        Service::where('state_id', '=', 1)->delete();


    }
}
