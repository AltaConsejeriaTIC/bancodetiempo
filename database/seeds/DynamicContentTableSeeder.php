<?php

use App\Models\DynamicContent;
use Faker\Generator;
use Styde\Seeder\Seeder;

class DynamicContentTableSeeder extends Seeder
{
    public function getModel()
    {
        return new DynamicContent();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {
        return [

        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create([
          "name" => "footer",
          "description" => "footer",
            "html" => '<div class="row">
                    <div class="col-xs-6">
                        <ul>
                            <li class="paragraph6 text-white">Registrarse</li>
                            <li class="paragraph6 text-white">Iniciar Sesión</li>
                            <li class="paragraph6 text-white">¿Cómo funciona?</li>
                        </ul>
                    </div>
                    <div class="col-xs-6">
                        <ul>
                            <li class="paragraph6 text-white">Políticas de Privacidad</li>
                            <li class="paragraph6 text-white">Términos y Condiciones</li>
                            <li class="paragraph6 text-white"></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <span>
                            <a href="https://www.facebook.com/Cambalachea.co" target="_blank" class="circle-social-network text-center col-xs-2 col-xs-offset-4">
                               <i class="fa fa-facebook icons-social-network" aria-hidden="true"></i>
                            </a>
                        </span>
                        <span>
                            <a href="https://twitter.com/cambalachea" target="_blank" class="circle-social-network text-center col-xs-2">
                                <i class="fa fa-twitter icons-social-network" aria-hidden="true"></i>
                            </a>
                        </span>
                    </div>
                </div>
        <br>
        <div class="row">
        <div class="col-xs-12  text-center">
        <p>¿Tienes sugerencias, dudas o comentarios?<br>
        Contáctanos a evenvivelab_bog@unal.edu.co</p>
        </div>
        </div><br>
        <div class="row">
        <div class="col-xs-12">
        <div class="flex-center logoFooter">
             <img src="/images/logoFooter1.png" alt="" class="col-sm-4 col-xs-8 col-xs-offset-2 col-md-3">
             <img src="/images/logoFooter2.png" alt="" class="col-sm-4 col-xs-8 col-xs-offset-2 col-md-4">
             <img src="/images/logoFooter3.png" alt="" class="col-sm-4 col-xs-8 col-xs-offset-2 col-md-3">
        </div>
        </div>
        </div>'
        ]);
    }
}
