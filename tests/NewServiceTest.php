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
        $json = json_decode(file_get_contents(url('/').'/tags'));
        $this->assertTrue(count($json) > 0);
        $this->assertTrue(end($json)->tag == 'tagTest');
    }

    public function testCreateService()
    {

        $user = User::find(2);
        Auth()->login($user);
        $this->assertTrue(Auth::check());

        $this->post('/service/save', ['serviceName' => 'pruebaXXXXX',
            'descriptionService' => 'prueba prueba prueba prueba prueba prueba prueba prueba prueba',
            'modalityServicePresently' => 1,
            'valueService' => 2,
            'categoryService' => 2,
            'tagService' => 'est']);
        $service = Service::all()->last();

        $this->assertTrue($service->name == 'pruebaXXXXX');
    }
    
    public function testEditService()
    {
        $user = User::find(2);
        Auth()->login($user);
        $this->assertTrue(Auth::check());
        $service = Service::all()->last();

        $this->put('/service/save/'.$service->id, ['serviceName' => 'pruebaXXXXXEditada',
            'descriptionService' => 'prueba prueba prueba prueba prueba prueba prueba prueba prueba',
            'modalityServicePresently' => 1,
            'valueService' => 2,
            'categoryService' => 2,
            'tagService' => 'est']);

        $service = Service::all()->last();

        $this->assertTrue($service->name == 'pruebaXXXXXEditada');
    }
}