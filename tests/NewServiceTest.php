<?php

use App\Models\Service;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class NewServiceTest extends TestCase
{
    public function testDAOTags()
    {

        Tag::create([
            'tag' => 'tagTest'
        ]);
        $json = json_decode(file_get_contents(url('/') . '/tags'));
        $this->assertTrue(count($json) > 0);
        $this->assertTrue(end($json)->tag == 'tagTest');
    }

    public function testCreateService()
    {

        $this->testLogin();
        $this->post('/service/save', ['serviceName' => 'pruebaXXXXX',
            'descriptionService' => 'prueba prueba prueba prueba prueba prueba prueba prueba prueba',
            'modalityServicePresently' => 1,
            'valueService' => 2,
            'categoryService' => 2,
            'tagService' => 'est']);
        $service = Service::all()->last();

        $this->assertTrue($service->name == 'pruebaXXXXX');
    }

    public function testGetService()
    {
        $this->testCreateService();
        $service = Service::all()->last();
        $response = $this->call('GET','/service/' . $service->id);

        //dd($service);
        $this->assertEquals(200, $response->status());

    }

    public function testEditService()
    {
        $this->testLogin();
        $service = Service::all()->last();

        $this->put('/service/save/' . $service->id, ['serviceName' => 'pruebaXXXXXEditada',
            'descriptionService' => 'prueba prueba prueba prueba prueba prueba prueba prueba prueba',
            'modalityServicePresently' => 1,
            'valueService' => 2,
            'categoryService' => 2,
            'tagService' => 'est']);

        $service = Service::all()->last();

        $this->assertTrue($service->name == 'pruebaXXXXXEditada');
    }

    public function testDeleteService()
    {

        $this->testLogin();
        $this->createService();
        $originalService = $this->createService();

        $this->get('/serviceDelete/' . $originalService->id);

        $service = Service::all()->last();

        $this->assertTrue($service->id != $originalService->id);
    }

    public function testLogin()
    {
        $user = User::find(2);
        Auth()->login($user);
        $this->assertTrue(Auth::check());
    }

    public function createService(){

        return Service::create([
            'name' => 'Service',
            'description' => 'prueba prueba prueba prueba prueba prueba prueba prueba prueba',
            'presently' => 1,
            'image' => 'sadsa',
            'virtually' => 0,
            'value' => 2,
            'category_id' => 2,
            'state_id' => 1,
            'user_id' => 2
        ]);
    }
}