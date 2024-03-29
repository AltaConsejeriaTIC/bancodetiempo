<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\CategoriesSites;
use App\Models\SuggestedSites;
use App\User;

class SuggestedSitesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testCreateCategory()
    {
        $user = User::find(1);
        Auth()->login($user);

        $this->post('/admin/suggestedSites/newCategory', ['name' => 'categoryPrueba',
            'icon' => 'bars'
        ]);

        $category = CategoriesSites::where('name', 'categoryPrueba');

        $this->assertTrue($category->get()->last()->name == 'categoryPrueba');

        $category->delete();

    }

    public function testCreateSuggestedSite(){

        $user = User::find(1);
        Auth()->login($user);

        $category = CategoriesSites::create([
            'name' => 'prueba',
            'icon' => 'bars'
        ]);

        $this->post('/admin/suggestedSites/newSite', ['name' => '34a636fe432d8ebd8ef8ad3280031648',
            'address' => 'crr 88 # 55 - 66',
            'requirements' => 'Papeles Al día',
            'contact' => 'Manuel Daza',
            'description' => 'sucio y ya',
            'coordinates' => '5126552, 5655545',
            'categoryId' => $category->id,
        ]);

        $site = SuggestedSites::where('name', '34a636fe432d8ebd8ef8ad3280031648');

        $this->assertTrue($site->get()->last()->name == '34a636fe432d8ebd8ef8ad3280031648');
        $this->assertTrue(strpos($site->get()->last()->requirements, '\ \r\n') === false);
        $this->assertTrue(strpos($site->get()->last()->contact, '\ \r\n') === false);
        $this->assertTrue(strpos($site->get()->last()->description, '\ \r\n') === false);

        $site->delete();
        $category->delete();
    }

    public function testEditSuggestedSite(){

        $user = User::find(1);
        Auth()->login($user);

        $category = CategoriesSites::create([
            'name' => 'prueba',
            'icon' => 'bars'
        ]);

        $this->post('/admin/suggestedSites/newSite', ['name' => '34a636fe432d8ebd8ef8ad3280031648',
            'address' => 'crr 88 # 55 - 66',
            'requirements' => 'Papeles Al día',
            'contact' => 'Manuel Daza',
            'description' => 'sucio y ya',
            'coordinates' => '5126552, 5655545',
            'categoryId' => $category->id,
        ]);

        $site = SuggestedSites::where('name', '34a636fe432d8ebd8ef8ad3280031648')->get()->last();

        $this->post('/admin/suggestedSites/editSite', ['name' => 'editado',
            'address' => 'crr 88 # 55 - 66 editado',
            'requirements' => 'Papeles Al día editado',
            'contact' => 'Manuel Daza editado',
            'description' => 'sucio y ya editado',
            'coordinates' => '5126552, 5655545',
            'siteId' => $site->id
        ]);

        $site = SuggestedSites::find($site->id);

        $this->assertTrue($site->name == 'editado');
        $this->assertTrue($site->address == 'crr 88 # 55 - 66 editado');

        $site->delete();
        $category->delete();
    }



}
